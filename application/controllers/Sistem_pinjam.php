<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistem_pinjam extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('sistem_pinjam_model');
  }
	
	public function index()
	{
		$data['title'] = 'Sistem Pinjam';
		$data['sistem_pinjam'] = $this->sistem_pinjam_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('sistem_pinjam/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$sistem_pinjam = $this->input->post('sistem_pinjam');
		
		$data=array(
			'nama_sistem_pinjam'=> $sistem_pinjam,
		);

		$this->sistem_pinjam_model->tambah_data($data, 'sistem_pinjam');
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
    	redirect('sistem_pinjam');
	}

	public function proses_ubah()
	{
        $kode = $this->input->post('id_sistem_pinjam');
		$sistem_pinjam = $this->input->post('sistem_pinjam');
		
		$data=array(
			'nama_sistem_pinjam'=> $sistem_pinjam,
		);

		$where = array(
			'id_sistem_pinjam'=>$kode
		);

		$this->sistem_pinjam_model->ubah_data($where, $data, 'sistem_pinjam');
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
    	redirect('sistem_pinjam');
	}

	public function proses_hapus($id)
	{
		$where = array('id_sistem_pinjam' => $id );
		$this->sistem_pinjam_model->hapus_data($where, 'sistem_pinjam');
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
		redirect('sistem_pinjam');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_sistem_pinjam' => $id );
    	$data = $this->sistem_pinjam_model->detail_data($where, 'sistem_pinjam')->result();
    	echo json_encode($data);
	}

}
