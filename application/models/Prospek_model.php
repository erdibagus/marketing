<?php
class Prospek_model extends ci_model{


    var $table = 'prospek';
    var $column_order = array(null, 'tanggal_prospek', null, null, null, null, null, null, null); //set column field database for datatable orderable
    var $column_search = array('tanggal_prospek','nama','nama_nasabah_prospek'); //set column field database for datatable searchable 
    var $order = array('tanggal_prospek' => 'desc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
      $this->db->from('prospek as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->join('kategori as s', 's.id_kategori = p.kategori_id');
      $this->db->join('kantor as d', 'd.id_kantor = p.kpk');
      $this->db->join('nasabah_prospek as j', 'j.id_nasabah_prospek = p.nasabah_id');


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
      $this->db->from('prospek');
      $this->db->join('user', 'id_user = user_id');
      $this->db->join('kategori', 'id_kategori = kategori_id');
      $this->db->join('kantor', 'id_kantor = kpk');
      $this->db->join('nasabah_prospek', 'id_nasabah_prospek = nasabah_id');
      $this->db->where('prospek.user_id', $this->session->userdata('login_session')['id_user']);

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
      $this->db->from('prospek');
      $this->db->join('user', 'id_user = user_id');
      $this->db->join('kategori', 'id_kategori = kategori_id');
      $this->db->join('kantor', 'id_kantor = kpk');
      $this->db->join('nasabah_prospek', 'id_nasabah_prospek = nasabah_id');
      $this->db->where('prospek.kpk', $this->session->userdata('login_session')['kantor_id']);

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

    private function _get_datatables_querytgluserkantor($tglawal, $tglakhir, $user, $kantor)
    {
      $this->db->from('prospek as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->join('kategori as s', 's.id_kategori = p.kategori_id');
      $this->db->join('kantor as d', 'd.id_kantor = p.kpk');
      $this->db->join('nasabah_prospek as j', 'j.id_nasabah_prospek = p.nasabah_id');

      $this->db->where('p.tanggal_prospek >=', $tglawal);
      $this->db->where('p.tanggal_prospek <=', $tglakhir);
      $this->db->where('p.user_id =', $user);
      $this->db->where('p.kpk =', $kantor);

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

    function get_datatablestgluserkantor($tglawal, $tglakhir, $user, $kantor)
    {
        $this->_get_datatables_querytgluserkantor($tglawal, $tglakhir, $user, $kantor);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filteredtgluserkantor($tglawal, $tglakhir, $user, $kantor)
    {
        $this->_get_datatables_querytgluserkantor($tglawal, $tglakhir, $user, $kantor);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_alltgluserkantor($tglawal, $tglakhir, $user, $kantor)
    {
        $this->db->from($this->table);
        $this->db->where('tanggal_prospek >=', $tglawal);
        $this->db->where('tanggal_prospek <=', $tglakhir);
        $this->db->where('user_id =', $user);
        $this->db->where('kpk =', $kantor);
        return $this->db->count_all_results();
    }

    private function _get_datatables_querytgluser($tglawal, $tglakhir, $user)
    {
      $this->db->from('prospek as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->join('kategori as s', 's.id_kategori = p.kategori_id');
      $this->db->join('kantor as d', 'd.id_kantor = p.kpk');
      $this->db->join('nasabah_prospek as j', 'j.id_nasabah_prospek = p.nasabah_id');

      $this->db->where('p.tanggal_prospek >=', $tglawal);
      $this->db->where('p.tanggal_prospek <=', $tglakhir);
      $this->db->where('p.user_id =', $user);

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

    function get_datatablestgluser($tglawal, $tglakhir, $user)
    {
        $this->_get_datatables_querytgluser($tglawal, $tglakhir, $user);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filteredtgluser($tglawal, $tglakhir, $user)
    {
        $this->_get_datatables_querytgluser($tglawal, $tglakhir, $user);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_alltgluser($tglawal, $tglakhir, $user)
    {
        $this->db->from($this->table);
        $this->db->where('tanggal_prospek >=', $tglawal);
        $this->db->where('tanggal_prospek <=', $tglakhir);
        $this->db->where('user_id =', $user);
        return $this->db->count_all_results();
    }

    private function _get_datatables_querytglkantor($tglawal, $tglakhir, $kantor)
    {
      $this->db->from('prospek as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->join('kategori as s', 's.id_kategori = p.kategori_id');
      $this->db->join('kantor as d', 'd.id_kantor = p.kpk');
      $this->db->join('nasabah_prospek as j', 'j.id_nasabah_prospek = p.nasabah_id');

      $this->db->where('p.tanggal_prospek >=', $tglawal);
      $this->db->where('p.tanggal_prospek <=', $tglakhir);
      $this->db->where('p.kpk =', $kantor);

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

    function get_datatablestglkantor($tglawal, $tglakhir, $kantor)
    {
        $this->_get_datatables_querytglkantor($tglawal, $tglakhir, $kantor);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filteredtglkantor($tglawal, $tglakhir, $kantor)
    {
        $this->_get_datatables_querytglkantor($tglawal, $tglakhir, $kantor);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_alltglkantor($tglawal, $tglakhir, $kantor)
    {
        $this->db->from($this->table);
        $this->db->where('tanggal_prospek >=', $tglawal);
        $this->db->where('tanggal_prospek <=', $tglakhir);
        $this->db->where('kpk =', $kantor);
        return $this->db->count_all_results();
    }

    private function _get_datatables_querytgl($tglawal, $tglakhir)
    {
      $this->db->from('prospek as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->join('kategori as s', 's.id_kategori = p.kategori_id');
      $this->db->join('kantor as d', 'd.id_kantor = p.kpk');
      $this->db->join('nasabah_prospek as j', 'j.id_nasabah_prospek = p.nasabah_id');

      $this->db->where('p.tanggal_prospek >=', $tglawal);
      $this->db->where('p.tanggal_prospek <=', $tglakhir);

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

    function get_datatablestgl($tglawal, $tglakhir)
    {
        $this->_get_datatables_querytgl($tglawal, $tglakhir);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filteredtgl($tglawal, $tglakhir)
    {
        $this->_get_datatables_querytgl($tglawal, $tglakhir);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_alltgl($tglawal, $tglakhir)
    {
        $this->db->from($this->table);
        $this->db->where('tanggal_prospek >=', $tglawal);
        $this->db->where('tanggal_prospek <=', $tglakhir);
        return $this->db->count_all_results();
    }

    private function _get_datatables_querytglmanajer($tglawal, $tglakhir)
    {
      $this->db->from('prospek as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->join('kategori as s', 's.id_kategori = p.kategori_id');
      $this->db->join('kantor as d', 'd.id_kantor = p.kpk');
      $this->db->join('nasabah_prospek as j', 'j.id_nasabah_prospek = p.nasabah_id');

      $this->db->where('p.tanggal_prospek >=', $tglawal);
      $this->db->where('p.tanggal_prospek <=', $tglakhir);
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

    function get_datatablestglmanajer($tglawal, $tglakhir)
    {
        $this->_get_datatables_querytglmanajer($tglawal, $tglakhir);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filteredtglmanajer($tglawal, $tglakhir)
    {
        $this->_get_datatables_querytglmanajer($tglawal, $tglakhir);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_alltglmanajer($tglawal, $tglakhir)
    {
        $this->db->from($this->table);
        $this->db->where('tanggal_prospek >=', $tglawal);
        $this->db->where('tanggal_prospek <=', $tglakhir);
        $this->db->where('kpk', $this->session->userdata('login_session')['kantor_id']);
        return $this->db->count_all_results();
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
    
    function count_filtered_manajer()
    {
        $this->_get_datatables_query_manajer();
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    function count_filtered_user()
    {
        $this->_get_datatables_query_user();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    public function count_all_manajer()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    public function count_all_user()
    {
        $this->db->from($this->table);
        $this->db->where('prospek.user_id', $this->session->userdata('login_session')['id_user']);
        return $this->db->count_all_results();
    }

    function data()
    {
        $this->db->order_by('id_prospek','DESC');
        return $query = $this->db->get('prospek');
    }

    public function dataJoin()
    {
      $this->db->select('*');
      $this->db->from('prospek as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->join('kategori as s', 's.id_kategori = p.kategori_id');
      $this->db->join('kantor as d', 'd.id_kantor = p.kpk');

      $this->db->order_by('p.id_prospek','DESC');
      return $query = $this->db->get();
    }

    public function dataJoinLike($tahun)
    {
      $this->db->select('*');
      $this->db->from('prospek as p');
      
      $this->db->like('p.tanggal_prospek', $tahun);
      $this->db->order_by('p.id_prospek','DESC');
      return $query = $this->db->get();
    }

    public function dataJoinLikeUser($tahun, $user)
    {
      $this->db->select('*');
      $this->db->from('prospek as p');
      
      $this->db->like('p.tanggal_prospek', $tahun);
      $this->db->where('p.user_id =', $user);
      $this->db->order_by('p.id_prospek','DESC');
      return $query = $this->db->get();
    }

    public function dataJoinLikeKpk($tahun, $kpk)
    {
      $this->db->select('*');
      $this->db->from('prospek as p');
      
      $this->db->like('p.tanggal_prospek', $tahun);
      $this->db->where('p.kpk =', $kpk);
      $this->db->order_by('p.id_prospek','DESC');
      return $query = $this->db->get();
    }

    public function transaksiTerakhir()
    {
      $this->db->select('*');
      $this->db->from('prospek as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->join('kategori as s', 's.id_kategori = p.kategori_id');
      $this->db->join('kantor as d', 'd.id_kantor = p.kpk');

      $this->db->order_by('p.id_prospek','DESC');
      $this->db->limit(5);
      return $query = $this->db->get();
    }

    function lapdatatgluserkantor($tglAwal, $tglAkhir, $user, $kantor)
    {
      $this->db->select('*');
      $this->db->from('prospek as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->join('kategori as s', 's.id_kategori = p.kategori_id');
      $this->db->join('kantor as d', 'd.id_kantor = p.kpk');
      $this->db->join('nasabah_prospek as j', 'j.id_nasabah_prospek = p.nasabah_id');

      $this->db->where('p.tanggal_prospek >=', $tglAwal);
      $this->db->where('p.tanggal_prospek <=', $tglAkhir);
      $this->db->where('p.user_id =', $user);
      $this->db->where('p.kpk =', $kantor);
      return $query = $this->db->get();
    }

    function lapdatatgluser($tglAwal, $tglAkhir, $user)
    {
      $this->db->select('*');
      $this->db->from('prospek as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->join('kategori as s', 's.id_kategori = p.kategori_id');
      $this->db->join('kantor as d', 'd.id_kantor = p.kpk');
      $this->db->join('nasabah_prospek as j', 'j.id_nasabah_prospek = p.nasabah_id');

      $this->db->where('p.tanggal_prospek >=', $tglAwal);
      $this->db->where('p.tanggal_prospek <=', $tglAkhir);
      $this->db->where('p.user_id =', $user);
      return $query = $this->db->get();
    }

    function lapdatatglkantor($tglAwal, $tglAkhir, $kantor)
    {
      $this->db->select('*');
      $this->db->from('prospek as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->join('kategori as s', 's.id_kategori = p.kategori_id');
      $this->db->join('kantor as d', 'd.id_kantor = p.kpk');
      $this->db->join('nasabah_prospek as j', 'j.id_nasabah_prospek = p.nasabah_id');

      $this->db->where('p.tanggal_prospek >=', $tglAwal);
      $this->db->where('p.tanggal_prospek <=', $tglAkhir);
      $this->db->where('p.kpk =', $kantor);
      return $query = $this->db->get();
    }
    
    function lapdatatgl($tglAwal, $tglAkhir)
    {
      $this->db->select('*');
      $this->db->from('prospek as p');
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->join('kategori as s', 's.id_kategori = p.kategori_id');
      $this->db->join('kantor as d', 'd.id_kantor = p.kpk');
      $this->db->join('nasabah_prospek as j', 'j.id_nasabah_prospek = p.nasabah_id');

      $this->db->where('p.tanggal_prospek >=', $tglAwal);
      $this->db->where('p.tanggal_prospek <=', $tglAkhir);
      return $query = $this->db->get();
    }

    function lapdatatglmanajer($tglAwal, $tglAkhir)
    {
      $this->db->select('*');
      $this->db->from('prospek');
      $this->db->join('user', 'id_user = user_id');
      $this->db->join('kategori', 'id_kategori = kategori_id');
      $this->db->join('kantor', 'id_kantor = kpk');
      $this->db->join('nasabah_prospek', 'id_nasabah_prospek = nasabah_id');
      $this->db->where('prospek.kpk', $this->session->userdata('login_session')['kantor_id']);

      $this->db->where('tanggal_prospek >=', $tglAwal);
      $this->db->where('tanggal_prospek <=', $tglAkhir);
      return $query = $this->db->get();
    }

    function jmlperbulanuser($tglAwal, $tglAkhir, $user)
    {
      $this->db->from('prospek');

      $this->db->where('tanggal_prospek >=', $tglAwal);
      $this->db->where('tanggal_prospek <=', $tglAkhir);
      $this->db->where('user_id =', $user);
      return $query = $this->db->get();
    }

    function jmlperbulankpk($tglAwal, $tglAkhir, $kpk)
    {
      $this->db->from('prospek');

      $this->db->where('tanggal_prospek >=', $tglAwal);
      $this->db->where('tanggal_prospek <=', $tglAkhir);
      $this->db->where('kpk =', $kpk);
      return $query = $this->db->get();
    }

    function jmlperbulan($tglAwal, $tglAkhir)
    {
      $this->db->from('prospek');

      $this->db->where('tanggal_prospek >=', $tglAwal);
      $this->db->where('tanggal_prospek <=', $tglAkhir);
      return $query = $this->db->get();
    }

    public function detailJoin($where)
    {
      $this->db->from('prospek as p');
      $this->db->where('id_prospek', $where);
      $this->db->join('user as u', 'u.id_user = p.user_id');
      $this->db->join('kategori as s', 's.id_kategori = p.kategori_id');
      $this->db->join('kantor as d', 'd.id_kantor = p.kpk');
      $this->db->join('nasabah_prospek as j', 'j.id_nasabah_prospek = p.nasabah_id');
      $this->db->join('wilayah_kabupaten as ka', 'ka.id = j.kabupaten');
      $this->db->join('wilayah_kecamatan as ke', 'ke.id = j.kecamatan');
      $this->db->join('wilayah_desa as de', 'de.id = j.desa');

      return $query = $this->db->get();
    }


    public function ambilId($table, $where)
    {
       return $this->db->get_where($table, $where);
    }

    public function ambilFoto1($where)
    {
      $this->db->order_by('id_prospek','DESC');
      $this->db->limit(1);
      $query = $this->db->get_where('prospek', $where);   
      
      $data = $query->row();
      $foto1= $data->foto_p1;

      return $foto1;
    } 

    public function ambilFoto2($where)
    {
      $this->db->order_by('id_prospek','DESC');
      $this->db->limit(1);
      $query = $this->db->get_where('prospek', $where);   
      
      $data = $query->row();
      $foto2= $data->foto_p2;

      return $foto2;
    } 

    public function ambilFoto3($where)
    {
      $this->db->order_by('id_prospek','DESC');
      $this->db->limit(1);
      $query = $this->db->get_where('prospek', $where);   
      
      $data = $query->row();
      $foto3= $data->foto_p3;

      return $foto3;
    } 

    public function ambilFoto4($where)
    {
      $this->db->order_by('id_prospek','DESC');
      $this->db->limit(1);
      $query = $this->db->get_where('prospek', $where);   
      
      $data = $query->row();
      $foto4= $data->foto_p4;

      return $foto4;
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

    public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }
}
