<?php
class Masterscoring_model extends ci_model{

    function datajenis_kelamin()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('jenis_kelamin');
    }

    public function ambilIdjenis_kelamin($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_datajenis_kelamin($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_datajenis_kelamin($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_datajenis_kelamin($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_datajenis_kelamin($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function datalokasi_perusahaan()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('lokasi_perusahaan');
    }

    public function ambilIdlokasi_perusahaan($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_datalokasi_perusahaan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_datalokasi_perusahaan($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_datalokasi_perusahaan($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_datalokasi_perusahaan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function datausia()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('usia');
    }

    public function ambilIdusia($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_datausia($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_datausia($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_datausia($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_datausia($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function datastatus_pernikahan()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('status_pernikahan');
    }

    public function ambilIdstatus_pernikahan($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_datastatus_pernikahan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_datastatus_pernikahan($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_datastatus_pernikahan($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_datastatus_pernikahan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function datatanggungan()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('tanggungan');
    }

    public function ambilIdtanggungan($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_datatanggungan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_datatanggungan($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_datatanggungan($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_datatanggungan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function datalama_tinggal()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('lama_tinggal');
    }

    public function ambilIdlama_tinggal($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_datalama_tinggal($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_datalama_tinggal($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_datalama_tinggal($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_datalama_tinggal($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function datalokasi_tinggal()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('lokasi_tinggal');
    }

    public function ambilIdlokasi_tinggal($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_datalokasi_tinggal($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_datalokasi_tinggal($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_datalokasi_tinggal($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_datalokasi_tinggal($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function datajenis_tinggal()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('jenis_tinggal');
    }

    public function ambilIdjenis_tinggal($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_datajenis_tinggal($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_datajenis_tinggal($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_datajenis_tinggal($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_datajenis_tinggal($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function datamemiliki_kendaraan()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('memiliki_kendaraan');
    }

    public function ambilIdmemiliki_kendaraan($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_datamemiliki_kendaraan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_datamemiliki_kendaraan($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_datamemiliki_kendaraan($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_datamemiliki_kendaraan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function datakepemilikan_kendaraan()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('kepemilikan_kendaraan');
    }

    public function ambilIdkepemilikan_kendaraan($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_datakepemilikan_kendaraan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_datakepemilikan_kendaraan($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_datakepemilikan_kendaraan($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_datakepemilikan_kendaraan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function datajenis_kendaraan()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('jenis_kendaraan');
    }

    public function ambilIdjenis_kendaraan($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_datajenis_kendaraan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_datajenis_kendaraan($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_datajenis_kendaraan($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_datajenis_kendaraan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function databentuk_perusahaan()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('bentuk_perusahaan');
    }

    public function ambilIdbentuk_perusahaan($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_databentuk_perusahaan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_databentuk_perusahaan($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_databentuk_perusahaan($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_databentuk_perusahaan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function datamasa_kerja()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('masa_kerja');
    }

    public function ambilIdmasa_kerja($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_datamasa_kerja($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_datamasa_kerja($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_datamasa_kerja($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_datamasa_kerja($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function databidang_usaha()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('bidang_usaha');
    }

    public function ambilIdbidang_usaha($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_databidang_usaha($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_databidang_usaha($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_databidang_usaha($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_databidang_usaha($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function databagian()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('bagian');
    }

    public function ambilIdbagian($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_databagian($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_databagian($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_databagian($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_databagian($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function datagaji()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('gaji');
    }

    public function ambilIdgaji($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_datagaji($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_datagaji($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_datagaji($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_datagaji($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function databesar_pinjam()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('besar_pinjam');
    }

    public function ambilIdbesar_pinjam($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_databesar_pinjam($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_databesar_pinjam($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_databesar_pinjam($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_databesar_pinjam($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function datatenor_pinjam()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('tenor_pinjam');
    }

    public function ambilIdtenor_pinjam($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_datatenor_pinjam($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_datatenor_pinjam($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_datatenor_pinjam($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_datatenor_pinjam($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function datatujuan_pinjam()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('tujuan_pinjam');
    }

    public function ambilIdtujuan_pinjam($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_datatujuan_pinjam($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_datatujuan_pinjam($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_datatujuan_pinjam($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_datatujuan_pinjam($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function datainstallment_ratio()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('installment_ratio');
    }

    public function ambilIdinstallment_ratio($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_datainstallment_ratio($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_datainstallment_ratio($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_datainstallment_ratio($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_datainstallment_ratio($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    function datacolateral_ratio()
    {
        $this->db->order_by('id');
        return $query = $this->db->get('colateral_ratio');
    }

    public function ambilIdcolateral_ratio($table, $where)
   {
        return $this->db->get_where($table, $where);
    }

    public function hapus_datacolateral_ratio($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function detail_datacolateral_ratio($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tambah_datacolateral_ratio($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_datacolateral_ratio($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }
}
