<?php
class User_model extends ci_model{


    function data()
    {
        $this->db->where('level =', 'user');
        $this->db->order_by('nama', 'ASC');
        return $query = $this->db->get('user');
    }

    function datauserupload($id = null)
    {
        $this->db->from('user');
        $this->db->join('kantor', 'id_kantor = kantor_id');
        $this->db->where('level =', 'user');
        $this->db->where('divisi_id =', '2');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get()->result();
    }

    function datamanajer()
    {
      $this->db->from('user');
      $this->db->where('level =', 'user');
      $this->db->where('user.kantor_id', $this->session->userdata('login_session')['kantor_id']);

      $this->db->order_by('id_user');
      return $query = $this->db->get();
    }

    public function ambilFoto($where)
    {
      $this->db->order_by('id_user','DESC');
      $this->db->limit(1);
      $query = $this->db->get_where('user', $where);   
      
      $data = $query->row();
      $foto= $data->foto;
      
      return $foto;
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

    public function dataJoin()
    {
      $this->db->select('*');
      $this->db->from('user as u');
      $this->db->join('divisi as d', 'd.id_divisi = u.divisi_id');
      $this->db->join('kantor as k', 'k.id_kantor = u.kantor_id');

      $this->db->order_by('u.id_user');
      return $query = $this->db->get();
    }

    public function dataJoinmanajer()
    {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->join('divisi', 'id_divisi = divisi_id');
      $this->db->join('kantor', 'id_kantor = kantor_id');
      $this->db->where('user.kantor_id', $this->session->userdata('login_session')['kantor_id']);

      $this->db->order_by('id_user');
      return $query = $this->db->get();
    }

    public function detail_data($where)
    {
      $this->db->select('*');
      $this->db->from('user as b');
      $this->db->where('b.id_user', $where);
      $this->db->join('kantor as j', 'j.id_kantor = b.kantor_id');
      $this->db->join('divisi as s', 's.id_divisi = b.divisi_id');

      $this->db->order_by('b.id_user','DESC');
      return $query = $this->db->get();
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


    public function buat_kode()   {
		  $this->db->select('RIGHT(user.id_user,3) as kode', FALSE);
		  $this->db->order_by('id_user','DESC');
		  $this->db->limit(1);
		  $query = $this->db->get('user');      //cek dulu apakah ada sudah ada kode di tabel.
		  if($query->num_rows() <> 0){
		   //jika kode ternyata sudah ada.
		   $data = $query->row();
		   $kode = intval($data->kode) + 1;
		  }
		  else {
		   //jika kode belum ada
		   $kode = 1;
		  }
		  $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "USR-".$kodemax;    // hasilnya ODJ-0001 dst.
		  return $kodejadi;
	}

}
