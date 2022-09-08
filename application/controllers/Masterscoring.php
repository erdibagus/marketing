<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterscoring extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('masterscoring_model');
  }
	
	public function jenis_kelamin()
	{
		$data['title'] = 'Sosial Demografic';
		$data['jenis_kelamin'] = $this->masterscoring_model->datajenis_kelamin()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/jenis_kelamin/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahjenis_kelamin()
	{
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_jenis_kelamin'=> $jenis_kelamin,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_datajenis_kelamin($data, 'jenis_kelamin');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/jenis_kelamin');
	}

	public function proses_ubahjenis_kelamin()
	{
        $kode = $this->input->post('idjenis_kelamin');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_jenis_kelamin'=> $jenis_kelamin,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_datajenis_kelamin($where, $data, 'jenis_kelamin');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/jenis_kelamin');
	}

	public function proses_hapusjenis_kelamin($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_datajenis_kelamin($where, 'jenis_kelamin');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/jenis_kelamin');
	}

	public function getDatajenis_kelamin()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_datajenis_kelamin($where, 'jenis_kelamin')->result();
    	echo json_encode($data);
	}

	public function usia()
	{
		$data['title'] = 'Sosial Demografic';
		$data['usia'] = $this->masterscoring_model->datausia()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/usia/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahusia()
	{
		$usia = $this->input->post('usia');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_usia'=> $usia,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_datausia($data, 'usia');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/usia');
	}

	public function proses_ubahusia()
	{
        $kode = $this->input->post('idusia');
		$usia = $this->input->post('usia');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_usia'=> $usia,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_datausia($where, $data, 'usia');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/usia');
	}

	public function proses_hapususia($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_datausia($where, 'usia');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/usia');
	}

	public function getDatausia()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_datausia($where, 'usia')->result();
    	echo json_encode($data);
	}

	public function status_pernikahan()
	{
		$data['title'] = 'Sosial Demografic';
		$data['status_pernikahan'] = $this->masterscoring_model->datastatus_pernikahan()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/status_pernikahan/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahstatus_pernikahan()
	{
		$status_pernikahan = $this->input->post('status_pernikahan');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_status_pernikahan'=> $status_pernikahan,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_datastatus_pernikahan($data, 'status_pernikahan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/status_pernikahan');
	}

	public function proses_ubahstatus_pernikahan()
	{
        $kode = $this->input->post('idstatus_pernikahan');
		$status_pernikahan = $this->input->post('status_pernikahan');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_status_pernikahan'=> $status_pernikahan,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_datastatus_pernikahan($where, $data, 'status_pernikahan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/status_pernikahan');
	}

	public function proses_hapusstatus_pernikahan($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_datastatus_pernikahan($where, 'status_pernikahan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/status_pernikahan');
	}

	public function getDatastatus_pernikahan()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_datastatus_pernikahan($where, 'status_pernikahan')->result();
    	echo json_encode($data);
	}

	public function tanggungan()
	{
		$data['title'] = 'Sosial Demografic';
		$data['tanggungan'] = $this->masterscoring_model->datatanggungan()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/tanggungan/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahtanggungan()
	{
		$tanggungan = $this->input->post('tanggungan');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_tanggungan'=> $tanggungan,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_datatanggungan($data, 'tanggungan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/tanggungan');
	}

	public function proses_ubahtanggungan()
	{
        $kode = $this->input->post('idtanggungan');
		$tanggungan = $this->input->post('tanggungan');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_tanggungan'=> $tanggungan,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_datatanggungan($where, $data, 'tanggungan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/tanggungan');
	}

	public function proses_hapustanggungan($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_datatanggungan($where, 'tanggungan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/tanggungan');
	}

	public function getDatatanggungan()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_datatanggungan($where, 'tanggungan')->result();
    	echo json_encode($data);
	}

	public function lama_tinggal()
	{
		$data['title'] = 'Sosial Demografic';
		$data['lama_tinggal'] = $this->masterscoring_model->datalama_tinggal()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/lama_tinggal/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahlama_tinggal()
	{
		$lama_tinggal = $this->input->post('lama_tinggal');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_lama_tinggal'=> $lama_tinggal,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_datalama_tinggal($data, 'lama_tinggal');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/lama_tinggal');
	}

	public function proses_ubahlama_tinggal()
	{
        $kode = $this->input->post('idlama_tinggal');
		$lama_tinggal = $this->input->post('lama_tinggal');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_lama_tinggal'=> $lama_tinggal,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_datalama_tinggal($where, $data, 'lama_tinggal');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/lama_tinggal');
	}

	public function proses_hapuslama_tinggal($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_datalama_tinggal($where, 'lama_tinggal');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/lama_tinggal');
	}

	public function getDatalama_tinggal()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_datalama_tinggal($where, 'lama_tinggal')->result();
    	echo json_encode($data);
	}

	public function lokasi_tinggal()
	{
		$data['title'] = 'Sosial Demografic';
		$data['lokasi_tinggal'] = $this->masterscoring_model->datalokasi_tinggal()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/lokasi_tinggal/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahlokasi_tinggal()
	{
		$lokasi_tinggal = $this->input->post('lokasi_tinggal');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_lokasi_tinggal'=> $lokasi_tinggal,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_datalokasi_tinggal($data, 'lokasi_tinggal');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/lokasi_tinggal');
	}

	public function proses_ubahlokasi_tinggal()
	{
        $kode = $this->input->post('idlokasi_tinggal');
		$lokasi_tinggal = $this->input->post('lokasi_tinggal');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_lokasi_tinggal'=> $lokasi_tinggal,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_datalokasi_tinggal($where, $data, 'lokasi_tinggal');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/lokasi_tinggal');
	}

	public function proses_hapuslokasi_tinggal($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_datalokasi_tinggal($where, 'lokasi_tinggal');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/lokasi_tinggal');
	}

	public function getDatalokasi_tinggal()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_datalokasi_tinggal($where, 'lokasi_tinggal')->result();
    	echo json_encode($data);
	}

	public function jenis_tinggal()
	{
		$data['title'] = 'Sosial Demografic';
		$data['jenis_tinggal'] = $this->masterscoring_model->datajenis_tinggal()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/jenis_tinggal/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahjenis_tinggal()
	{
		$jenis_tinggal = $this->input->post('jenis_tinggal');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_jenis_tinggal'=> $jenis_tinggal,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_datajenis_tinggal($data, 'jenis_tinggal');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/jenis_tinggal');
	}

	public function proses_ubahjenis_tinggal()
	{
        $kode = $this->input->post('idjenis_tinggal');
		$jenis_tinggal = $this->input->post('jenis_tinggal');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_jenis_tinggal'=> $jenis_tinggal,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_datajenis_tinggal($where, $data, 'jenis_tinggal');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/jenis_tinggal');
	}

	public function proses_hapusjenis_tinggal($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_datajenis_tinggal($where, 'jenis_tinggal');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/jenis_tinggal');
	}

	public function getDatajenis_tinggal()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_datajenis_tinggal($where, 'jenis_tinggal')->result();
    	echo json_encode($data);
	}

	public function memiliki_kendaraan()
	{
		$data['title'] = 'Sosial Demografic';
		$data['memiliki_kendaraan'] = $this->masterscoring_model->datamemiliki_kendaraan()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/memiliki_kendaraan/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahmemiliki_kendaraan()
	{
		$memiliki_kendaraan = $this->input->post('memiliki_kendaraan');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_memiliki_kendaraan'=> $memiliki_kendaraan,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_datamemiliki_kendaraan($data, 'memiliki_kendaraan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/memiliki_kendaraan');
	}

	public function proses_ubahmemiliki_kendaraan()
	{
        $kode = $this->input->post('idmemiliki_kendaraan');
		$memiliki_kendaraan = $this->input->post('memiliki_kendaraan');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_memiliki_kendaraan'=> $memiliki_kendaraan,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_datamemiliki_kendaraan($where, $data, 'memiliki_kendaraan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/memiliki_kendaraan');
	}

	public function proses_hapusmemiliki_kendaraan($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_datamemiliki_kendaraan($where, 'memiliki_kendaraan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/memiliki_kendaraan');
	}

	public function getDatamemiliki_kendaraan()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_datamemiliki_kendaraan($where, 'memiliki_kendaraan')->result();
    	echo json_encode($data);
	}

	public function kepemilikan_kendaraan()
	{
		$data['title'] = 'Sosial Demografic';
		$data['kepemilikan_kendaraan'] = $this->masterscoring_model->datakepemilikan_kendaraan()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/kepemilikan_kendaraan/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahkepemilikan_kendaraan()
	{
		$kepemilikan_kendaraan = $this->input->post('kepemilikan_kendaraan');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_kepemilikan_kendaraan'=> $kepemilikan_kendaraan,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_datakepemilikan_kendaraan($data, 'kepemilikan_kendaraan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/kepemilikan_kendaraan');
	}

	public function proses_ubahkepemilikan_kendaraan()
	{
        $kode = $this->input->post('idkepemilikan_kendaraan');
		$kepemilikan_kendaraan = $this->input->post('kepemilikan_kendaraan');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_kepemilikan_kendaraan'=> $kepemilikan_kendaraan,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_datakepemilikan_kendaraan($where, $data, 'kepemilikan_kendaraan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/kepemilikan_kendaraan');
	}

	public function proses_hapuskepemilikan_kendaraan($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_datakepemilikan_kendaraan($where, 'kepemilikan_kendaraan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/kepemilikan_kendaraan');
	}

	public function getDatakepemilikan_kendaraan()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_datakepemilikan_kendaraan($where, 'kepemilikan_kendaraan')->result();
    	echo json_encode($data);
	}

	public function jenis_kendaraan()
	{
		$data['title'] = 'Sosial Demografic';
		$data['jenis_kendaraan'] = $this->masterscoring_model->datajenis_kendaraan()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/jenis_kendaraan/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahjenis_kendaraan()
	{
		$jenis_kendaraan = $this->input->post('jenis_kendaraan');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_jenis_kendaraan'=> $jenis_kendaraan,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_datajenis_kendaraan($data, 'jenis_kendaraan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/jenis_kendaraan');
	}

	public function proses_ubahjenis_kendaraan()
	{
        $kode = $this->input->post('idjenis_kendaraan');
		$jenis_kendaraan = $this->input->post('jenis_kendaraan');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_jenis_kendaraan'=> $jenis_kendaraan,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_datajenis_kendaraan($where, $data, 'jenis_kendaraan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/jenis_kendaraan');
	}

	public function proses_hapusjenis_kendaraan($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_datajenis_kendaraan($where, 'jenis_kendaraan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/jenis_kendaraan');
	}

	public function getDatajenis_kendaraan()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_datajenis_kendaraan($where, 'jenis_kendaraan')->result();
    	echo json_encode($data);
	}

	public function bentuk_perusahaan()
	{
		$data['title'] = 'Pekerjaan';
		$data['bentuk_perusahaan'] = $this->masterscoring_model->databentuk_perusahaan()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/bentuk_perusahaan/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahbentuk_perusahaan()
	{
		$bentuk_perusahaan = $this->input->post('bentuk_perusahaan');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_bentuk_perusahaan'=> $bentuk_perusahaan,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_databentuk_perusahaan($data, 'bentuk_perusahaan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/bentuk_perusahaan');
	}

	public function proses_ubahbentuk_perusahaan()
	{
        $kode = $this->input->post('idbentuk_perusahaan');
		$bentuk_perusahaan = $this->input->post('bentuk_perusahaan');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_bentuk_perusahaan'=> $bentuk_perusahaan,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_databentuk_perusahaan($where, $data, 'bentuk_perusahaan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/bentuk_perusahaan');
	}

	public function proses_hapusbentuk_perusahaan($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_databentuk_perusahaan($where, 'bentuk_perusahaan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/bentuk_perusahaan');
	}

	public function getDatabentuk_perusahaan()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_databentuk_perusahaan($where, 'bentuk_perusahaan')->result();
    	echo json_encode($data);
	}

	public function lokasi_perusahaan()
	{
		$data['title'] = 'Pekerjaan';
		$data['lokasi_perusahaan'] = $this->masterscoring_model->datalokasi_perusahaan()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/lokasi_perusahaan/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahlokasi_perusahaan()
	{
		$lokasi_perusahaan = $this->input->post('lokasi_perusahaan');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_lokasi_perusahaan'=> $lokasi_perusahaan,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_datalokasi_perusahaan($data, 'lokasi_perusahaan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/lokasi_perusahaan');
	}

	public function proses_ubahlokasi_perusahaan()
	{
        $kode = $this->input->post('idlokasi_perusahaan');
		$lokasi_perusahaan = $this->input->post('lokasi_perusahaan');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_lokasi_perusahaan'=> $lokasi_perusahaan,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_datalokasi_perusahaan($where, $data, 'lokasi_perusahaan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/lokasi_perusahaan');
	}

	public function proses_hapuslokasi_perusahaan($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_datalokasi_perusahaan($where, 'lokasi_perusahaan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/lokasi_perusahaan');
	}

	public function getDatalokasi_perusahaan()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_datalokasi_perusahaan($where, 'lokasi_perusahaan')->result();
    	echo json_encode($data);
	}

	public function masa_kerja()
	{
		$data['title'] = 'Pekerjaan';
		$data['masa_kerja'] = $this->masterscoring_model->datamasa_kerja()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/masa_kerja/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahmasa_kerja()
	{
		$masa_kerja = $this->input->post('masa_kerja');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_masa_kerja'=> $masa_kerja,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_datamasa_kerja($data, 'masa_kerja');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/masa_kerja');
	}

	public function proses_ubahmasa_kerja()
	{
        $kode = $this->input->post('idmasa_kerja');
		$masa_kerja = $this->input->post('masa_kerja');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_masa_kerja'=> $masa_kerja,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_datamasa_kerja($where, $data, 'masa_kerja');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/masa_kerja');
	}

	public function proses_hapusmasa_kerja($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_datamasa_kerja($where, 'masa_kerja');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/masa_kerja');
	}

	public function getDatamasa_kerja()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_datamasa_kerja($where, 'masa_kerja')->result();
    	echo json_encode($data);
	}

	public function bidang_usaha()
	{
		$data['title'] = 'Pekerjaan';
		$data['bidang_usaha'] = $this->masterscoring_model->databidang_usaha()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/bidang_usaha/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahbidang_usaha()
	{
		$bidang_usaha = $this->input->post('bidang_usaha');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_bidang_usaha'=> $bidang_usaha,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_databidang_usaha($data, 'bidang_usaha');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/bidang_usaha');
	}

	public function proses_ubahbidang_usaha()
	{
        $kode = $this->input->post('idbidang_usaha');
		$bidang_usaha = $this->input->post('bidang_usaha');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_bidang_usaha'=> $bidang_usaha,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_databidang_usaha($where, $data, 'bidang_usaha');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/bidang_usaha');
	}

	public function proses_hapusbidang_usaha($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_databidang_usaha($where, 'bidang_usaha');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/bidang_usaha');
	}

	public function getDatabidang_usaha()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_databidang_usaha($where, 'bidang_usaha')->result();
    	echo json_encode($data);
	}

	public function bagian()
	{
		$data['title'] = 'Pekerjaan';
		$data['bagian'] = $this->masterscoring_model->databagian()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/bagian/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahbagian()
	{
		$bagian = $this->input->post('bagian');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_bagian'=> $bagian,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_databagian($data, 'bagian');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/bagian');
	}

	public function proses_ubahbagian()
	{
        $kode = $this->input->post('idbagian');
		$bagian = $this->input->post('bagian');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_bagian'=> $bagian,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_databagian($where, $data, 'bagian');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/bagian');
	}

	public function proses_hapusbagian($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_databagian($where, 'bagian');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/bagian');
	}

	public function getDatabagian()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_databagian($where, 'bagian')->result();
    	echo json_encode($data);
	}

	public function gaji()
	{
		$data['title'] = 'Pekerjaan';
		$data['gaji'] = $this->masterscoring_model->datagaji()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/gaji/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahgaji()
	{
		$gaji = $this->input->post('gaji');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_gaji'=> $gaji,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_datagaji($data, 'gaji');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/gaji');
	}

	public function proses_ubahgaji()
	{
        $kode = $this->input->post('idgaji');
		$gaji = $this->input->post('gaji');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_gaji'=> $gaji,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_datagaji($where, $data, 'gaji');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/gaji');
	}

	public function proses_hapusgaji($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_datagaji($where, 'gaji');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/gaji');
	}

	public function getDatagaji()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_datagaji($where, 'gaji')->result();
    	echo json_encode($data);
	}

	public function besar_pinjam()
	{
		$data['title'] = 'Credit Application';
		$data['besar_pinjam'] = $this->masterscoring_model->databesar_pinjam()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/besar_pinjam/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahbesar_pinjam()
	{
		$besar_pinjam = $this->input->post('besar_pinjam');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_besar_pinjam'=> $besar_pinjam,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_databesar_pinjam($data, 'besar_pinjam');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/besar_pinjam');
	}

	public function proses_ubahbesar_pinjam()
	{
        $kode = $this->input->post('idbesar_pinjam');
		$besar_pinjam = $this->input->post('besar_pinjam');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_besar_pinjam'=> $besar_pinjam,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_databesar_pinjam($where, $data, 'besar_pinjam');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/besar_pinjam');
	}

	public function proses_hapusbesar_pinjam($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_databesar_pinjam($where, 'besar_pinjam');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/besar_pinjam');
	}

	public function getDatabesar_pinjam()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_databesar_pinjam($where, 'besar_pinjam')->result();
    	echo json_encode($data);
	}

	public function tenor_pinjam()
	{
		$data['title'] = 'Credit Application';
		$data['tenor_pinjam'] = $this->masterscoring_model->datatenor_pinjam()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/tenor_pinjam/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahtenor_pinjam()
	{
		$tenor_pinjam = $this->input->post('tenor_pinjam');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_tenor_pinjam'=> $tenor_pinjam,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_datatenor_pinjam($data, 'tenor_pinjam');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/tenor_pinjam');
	}

	public function proses_ubahtenor_pinjam()
	{
        $kode = $this->input->post('idtenor_pinjam');
		$tenor_pinjam = $this->input->post('tenor_pinjam');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_tenor_pinjam'=> $tenor_pinjam,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_datatenor_pinjam($where, $data, 'tenor_pinjam');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/tenor_pinjam');
	}

	public function proses_hapustenor_pinjam($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_datatenor_pinjam($where, 'tenor_pinjam');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/tenor_pinjam');
	}

	public function getDatatenor_pinjam()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_datatenor_pinjam($where, 'tenor_pinjam')->result();
    	echo json_encode($data);
	}

	public function tujuan_pinjam()
	{
		$data['title'] = 'Credit Application';
		$data['tujuan_pinjam'] = $this->masterscoring_model->datatujuan_pinjam()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/tujuan_pinjam/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahtujuan_pinjam()
	{
		$tujuan_pinjam = $this->input->post('tujuan_pinjam');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_tujuan_pinjam'=> $tujuan_pinjam,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_datatujuan_pinjam($data, 'tujuan_pinjam');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/tujuan_pinjam');
	}

	public function proses_ubahtujuan_pinjam()
	{
        $kode = $this->input->post('idtujuan_pinjam');
		$tujuan_pinjam = $this->input->post('tujuan_pinjam');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_tujuan_pinjam'=> $tujuan_pinjam,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_datatujuan_pinjam($where, $data, 'tujuan_pinjam');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/tujuan_pinjam');
	}

	public function proses_hapustujuan_pinjam($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_datatujuan_pinjam($where, 'tujuan_pinjam');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/tujuan_pinjam');
	}

	public function getDatatujuan_pinjam()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_datatujuan_pinjam($where, 'tujuan_pinjam')->result();
    	echo json_encode($data);
	}

	public function installment_ratio()
	{
		$data['title'] = 'Financial';
		$data['installment_ratio'] = $this->masterscoring_model->datainstallment_ratio()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/installment_ratio/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahinstallment_ratio()
	{
		$installment_ratio = $this->input->post('installment_ratio');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_installment_ratio'=> $installment_ratio,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_datainstallment_ratio($data, 'installment_ratio');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/installment_ratio');
	}

	public function proses_ubahinstallment_ratio()
	{
        $kode = $this->input->post('idinstallment_ratio');
		$installment_ratio = $this->input->post('installment_ratio');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_installment_ratio'=> $installment_ratio,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_datainstallment_ratio($where, $data, 'installment_ratio');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/installment_ratio');
	}

	public function proses_hapusinstallment_ratio($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_datainstallment_ratio($where, 'installment_ratio');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/installment_ratio');
	}

	public function getDatainstallment_ratio()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_datainstallment_ratio($where, 'installment_ratio')->result();
    	echo json_encode($data);
	}

	public function colateral_ratio()
	{
		$data['title'] = 'Financial';
		$data['colateral_ratio'] = $this->masterscoring_model->datacolateral_ratio()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('masterscoring/colateral_ratio/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambahcolateral_ratio()
	{
		$colateral_ratio = $this->input->post('colateral_ratio');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_colateral_ratio'=> $colateral_ratio,
			'nilai'=> $nilai,
		);

		$this->masterscoring_model->tambah_datacolateral_ratio($data, 'colateral_ratio');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/colateral_ratio');
	}

	public function proses_ubahcolateral_ratio()
	{
        $kode = $this->input->post('idcolateral_ratio');
		$colateral_ratio = $this->input->post('colateral_ratio');
		$nilai = $this->input->post('nilai');
		
		$data=array(
			'nama_colateral_ratio'=> $colateral_ratio,
			'nilai'=> $nilai,
		);

		$where = array(
			'id'=>$kode
		);

		$this->masterscoring_model->ubah_datacolateral_ratio($where, $data, 'colateral_ratio');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('masterscoring/colateral_ratio');
	}

	public function proses_hapuscolateral_ratio($id)
	{
		$where = array('id' => $id );
		$this->masterscoring_model->hapus_datacolateral_ratio($where, 'colateral_ratio');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('masterscoring/colateral_ratio');
	}

	public function getDatacolateral_ratio()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->masterscoring_model->detail_datacolateral_ratio($where, 'colateral_ratio')->result();
    	echo json_encode($data);
	}
}
