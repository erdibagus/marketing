<?php
class Nasabah_prospek_model extends ci_model{

    var $table = 'nasabah_prospek';
    var $column_order = array(null,null,null,null,null,null,null,null,null); //set column field database for datatable orderable
    var $column_search = array('nama_nasabah_prospek'); //set column field database for datatable searchable 
    var $order = array('id_nasabah_prospek' => 'desc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
      $this->db->from('nasabah_prospek as b');
      
    //   scrip dibawah disable karna overload data desa

    //   $this->db->join('wilayah_provinsi as p', 'p.id = b.provinsi');
    //   $this->db->join('wilayah_kabupaten as k', 'k.id = b.kabupaten');
    //   $this->db->join('wilayah_kecamatan as c', 'c.id = b.kecamatan');
    //   $this->db->join('wilayah_desa as d', 'd.id = b.desa');



        $i = 0;
    
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function data()
    {
        $this->db->order_by('id_nasabah_prospek','DESC');
        return $query = $this->db->get('nasabah_prospek');
    }

    function dataperuser()
    {
        $this->db->join('wilayah_desa', 'id = desa');
        $this->db->order_by('id_nasabah_prospek','DESC');
        $this->db->where('nasabah_prospek.user_id', $this->session->userdata('login_session')['id_user']);
        return $query = $this->db->get('nasabah_prospek');
    }

    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }


    public function dataJoin()
    {
      $this->db->select('*');
      $this->db->from('nasabah_prospek as b');
      $this->db->join('wilayah_provinsi as p', 'p.id = b.provinsi');
      $this->db->join('wilayah_kabupaten as k', 'k.id = b.kabupaten');
      $this->db->join('wilayah_kecamatan as c', 'c.id = b.kecamatan');
      $this->db->join('wilayah_desa as d', 'd.id = b.desa');

      $this->db->order_by('b.id_nasabah_prospek','DESC');
      return $query = $this->db->get();
    }

    public function totalStok()
    {
      $data=$this->db
    ->select_sum('stok')
    ->from('nasabah_prospek')
    ->get();
      $stok = $data->row();
      return $stok->stok;
    }

    public function detail_join($where)
    {
      $this->db->select('*');
      $this->db->from('nasabah_prospek as b');
      $this->db->where('b.id_nasabah_prospek', $where);
      $this->db->join('jenis as j', 'j.id_jenis = b.id_jenis');
      $this->db->join('satuan as s', 's.id_satuan = b.id_satuan');

      $this->db->order_by('b.id_nasabah_prospek','DESC');
      return $query = $this->db->get();
    }

    public function ambil_stok($where){
      $this->db->order_by('id_nasabah_prospek','DESC');
      $this->db->limit(1);
      $query = $this->db->get_where('nasabah_prospek',$where);
      $data = $query->row();
      $stok = $data->stok;
      return $stok;
    }

    public function ambilId($table, $where)
   {
       return $this->db->get_where($table, $where);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }


    public function detail_data($where, $table)
    {
       return $this->db->get_where($table,$where);
    }

    public function tambah_data($data, $table)
    {
       $this->db->insert($table, $data);
    }

    public function ubah_data($where, $data, $table)
    {
       $this->db->where($where);
       $this->db->update($table, $data);

    }

}
