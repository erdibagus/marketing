<?php
class Storting_model extends ci_model{

    var $table = 'storting';
    var $column_order = array(null, 'rek', null, null,'realisasi', 'jatuh_tempo','plafon','baki_debet', 'pokok', 'bunga', 'denda', 'kolektabilitas'); //set column field database for datatable orderable
    var $column_search = array('rek','nama_nasabah'); //set column field database for datatable searchable 
    var $order = array('id_storting' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
      $this->db->from('storting as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->where('p.status =', '0');

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
      $this->db->from('storting as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->where('p.status =', '0');
      $this->db->where('p.kpk', $this->session->userdata('login_session')['kantor_id']);

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

    private function _get_datatables_query_peruser()
    {
      $this->db->from('storting as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->where('p.status =', '0');
      $this->db->where('p.user_id', $this->session->userdata('login_session')['id_user']);

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

    private function _get_datatables_query_selesai()
    {
      $this->db->from('storting as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->where('p.status =', '1');

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

    private function _get_datatables_query_selesai_manajer()
    {
      $this->db->from('storting as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->where('p.status =', '1');
      $this->db->where('p.kpk', $this->session->userdata('login_session')['kantor_id']);

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

    private function _get_datatables_query_selesai_peruser()
    {
      $this->db->from('storting as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->where('p.status =', '1');
      $this->db->where('p.user_id', $this->session->userdata('login_session')['id_user']);

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

    private function _get_datatables_query_user($usercek)
    {
      $this->db->from('storting as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->where('p.status =', '0');
      $this->db->where('p.user_id =', $usercek);

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

    private function _get_datatables_query_cek($tahun, $bulan, $user)
    {
      $this->db->from('storting as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->where('p.user_id =', $user);
      $this->db->where('p.tahun =', $tahun);
      $this->db->where('p.bulan =', $bulan);

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

    function get_datatables_manajer()
    {
        $this->_get_datatables_query_manajer();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatables_peruser()
    {
        $this->_get_datatables_query_peruser();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatables_selesai()
    {
        $this->_get_datatables_query_selesai();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatables_selesai_manajer()
    {
        $this->_get_datatables_query_selesai_manajer();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatables_selesai_peruser()
    {
        $this->_get_datatables_query_selesai_peruser();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatables_user($usercek)
    {
        $this->_get_datatables_query_user($usercek);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatables_cek($tahun, $bulan, $user)
    {
        $this->_get_datatables_query_cek($tahun, $bulan, $user);
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
        $this->db->where('status =', '0');
        $this->db->where('storting.user_id', $this->session->userdata('login_session')['id_user']);
        return $this->db->count_all_results();
    }
    function count_filtered_manajer()
    {
        $this->_get_datatables_query_manajer();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_manajer()
    {
        $this->db->from($this->table);
        $this->db->where('status =', '0');
        $this->db->where('storting.kpk', $this->session->userdata('login_session')['kantor_id']);
        return $this->db->count_all_results();
    }

    function count_filtered_peruser()
    {
        $this->_get_datatables_query_peruser();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_peruser()
    {
        $this->db->from($this->table);
        $this->db->where('status =', '0');
        $this->db->where('storting.user_id', $this->session->userdata('login_session')['id_user']);
        return $this->db->count_all_results();
    }

    function count_filtered_selesai()
    {
        $this->_get_datatables_query_selesai();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_selesai()
    {
        $this->db->from($this->table);
        $this->db->where('status =', '1');
        return $this->db->count_all_results();
    }

    function count_filtered_selesai_manajer()
    {
        $this->_get_datatables_query_selesai_manajer();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_selesai_manajer()
    {
        $this->db->from($this->table);
        $this->db->where('status =', '1');
        $this->db->where('storting.kpk', $this->session->userdata('login_session')['kantor_id']);
        return $this->db->count_all_results();
    }

    function count_filtered_selesai_peruser()
    {
        $this->_get_datatables_query_selesai_peruser();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_selesai_peruser()
    {
        $this->db->from($this->table);
        $this->db->where('status =', '1');
        $this->db->where('storting.user_id', $this->session->userdata('login_session')['id_user']);
        return $this->db->count_all_results();
    }

    function count_filtered_user($usercek)
    {
        $this->_get_datatables_query_user($usercek);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_user($usercek)
    {
        $this->db->from($this->table);
        $this->db->where('status =', '0');
        $this->db->where('storting.user_id =', $usercek);
        return $this->db->count_all_results();
    }

    function count_filtered_cek($tahun, $bulan, $user)
    {
        $this->_get_datatables_query_cek($tahun, $bulan, $user);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_cek($tahun, $bulan, $user)
    {
        $this->db->from($this->table);
        $this->db->where('storting.user_id =', $user);
        $this->db->where('storting.tahun =', $tahun);
        $this->db->where('storting.bulan =', $bulan);
        return $this->db->count_all_results();
    }

    function data()
    {
        $this->db->order_by('id_storting');
        return $query = $this->db->get('storting');
    }

    function dataperuser()
    {
        $this->db->where('storting.status =', '0');
        $this->db->where('storting.user_id', $this->session->userdata('login_session')['id_user']);
        $this->db->order_by('storting.nama_nasabah','ASC');
        return $query = $this->db->get('storting');
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

    public function hapus_data_all($user)
    {
        $this->db->where('user_id =', $user);
		$this->db->delete('storting');
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

    public function detailJoin($where)
    {
      $this->db->from('storting as p');
      $this->db->where('id_storting', $where);
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->join('kantor as d', 'd.id_kantor = p.kpk');

      return $query = $this->db->get();
    }

    function get_user($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('id_user', $params['id']);
        }

        else
        {
            $this->db->order_by('id_user', 'asc');
        }

        $this->db->select('id_user, nama');
        $res = $this->db->get('user');

        if(isset($params['id']))
        {
            return $res->row_array();
        }
        else
        {
            return $res->result_array();
        }
    }

    function get_majors($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('majors_id', $params['id']);
        }

        if(isset($params['majors_name']))
        {
            $this->db->where('majors_name', $params['majors_name']);
        }

        if(isset($params['majors_short_name']))
        {
            $this->db->where('majors_short_name', $params['majors_short_name']);
        }


        if(isset($params['limit']))
        {
            if(!isset($params['offset']))
            {
                $params['offset'] = NULL;
            }

            $this->db->limit($params['limit'], $params['offset']);
        }
        if(isset($params['order_by']))
        {
            $this->db->order_by($params['order_by'], 'desc');
        }
        else
        {
            $this->db->order_by('majors_id', 'asc');
        }

        $this->db->select('majors_id, majors_name, majors_short_name');
        $res = $this->db->get('majors');

        if(isset($params['id']))
        {
            return $res->row_array();
        }
        else
        {
            return $res->result_array();
        }
    }

}
