<?php
class Scoring_model extends ci_model{


    var $table = 'scoring';
    var $column_order = array(null,null,null,null,null,null,null,null,null); //set column field database for datatable orderable
    var $column_search = array('nama_nasabah'); //set column field database for datatable searchable 
    var $order = array('id_scoring' => 'desc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        $this->db->from('scoring as b');
        $this->db->join('survey as d', 'd.id_survey = b.survey_id');
        $this->db->join('kategori as k', 'k.id_kategori = d.kategori_id');
        $this->db->join('sistem_pinjam as s', 's.id_sistem_pinjam = d.sistem_pinjam');



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

    private function _get_datatables_query_user()
    {
        $this->db->from('scoring');
        $this->db->join('survey', 'id_survey = survey_id');
        $this->db->join('kategori', 'id_kategori = kategori_id');
        $this->db->join('sistem_pinjam', 'id_sistem_pinjam = sistem_pinjam');
        $this->db->where('survey.user_id', $this->session->userdata('login_session')['id_user']);

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

    private function _get_datatables_query_manajer()
    {
        $this->db->from('scoring');
        $this->db->join('survey', 'id_survey = survey_id');
        $this->db->join('kategori', 'id_kategori = kategori_id');
        $this->db->join('sistem_pinjam', 'id_sistem_pinjam = sistem_pinjam');
        $this->db->where('survey.kpk', $this->session->userdata('login_session')['kantor_id']);

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

    function get_datatables_user()
    {
        $this->_get_datatables_query_user();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatables_manajer()
    {
        $this->_get_datatables_query_manajer();
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
        $this->db->order_by('id_scoring','DESC');
        return $query = $this->db->get('scoring');
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
      $this->db->from('scoring as b');
      $this->db->join('survey as d', 'd.id_survey = b.survey_id');
      $this->db->join('kategori as k', 'k.id_kategori = d.kategori_id');
      $this->db->join('sistem_pinjam as s', 's.id_sistem_pinjam = d.sistem_pinjam');

      $this->db->order_by('b.id_scoring','DESC');
      return $query = $this->db->get();
    }

    public function detail_join($where)
    {
      $this->db->select('*');
      $this->db->from('scoring as b');
      $this->db->where('b.id_scoring', $where);
      $this->db->join('survey as d', 'd.id_survey = b.survey_id');
      $this->db->join('kategori as k', 'k.id_kategori = d.kategori_id');
      $this->db->join('sistem_pinjam as s', 's.id_sistem_pinjam = d.sistem_pinjam');
      $this->db->join('user as u', 'u.id_user = d.user_id');
      $this->db->join('kantor as p', 'p.id_kantor = d.kpk');
      $this->db->join('wilayah_kabupaten as ka', 'ka.id = d.kabupaten');
      $this->db->join('wilayah_kecamatan as ke', 'ke.id = d.kecamatan');
      $this->db->join('wilayah_desa as de', 'de.id = d.desa');

      $this->db->order_by('b.id_scoring','DESC');
      return $query = $this->db->get();
    }

    public function ambil_stok($where){
      $this->db->order_by('id_scoring','DESC');
      $this->db->limit(1);
      $query = $this->db->get_where('scoring',$where);
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
