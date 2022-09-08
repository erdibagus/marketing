<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agunan extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('agunan_model');
  }
	
	public function index()
	{
		$data['title'] = 'Agunan';
		$data['agunan'] = $this->agunan_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('agunan/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$agunan = $this->input->post('agunan');
		
		$data=array(
			'nama_agunan'=> $agunan,
		);

		$this->agunan_model->tambah_data($data, 'agunan');
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
    	redirect('agunan');
	}

	public function proses_ubah()
	{
        $kode = $this->input->post('idagunan');
		$agunan = $this->input->post('agunan');
		
		$data=array(
			'nama_agunan'=> $agunan,
		);

		$where = array(
			'id_agunan'=>$kode
		);

		$this->agunan_model->ubah_data($where, $data, 'agunan');
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
    	redirect('agunan');
	}

	public function proses_hapus($id)
	{
		$where = array('id_agunan' => $id );
		$this->agunan_model->hapus_data($where, 'agunan');
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
		redirect('agunan');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_agunan' => $id );
    	$data = $this->agunan_model->detail_data($where, 'agunan')->result();
    	echo json_encode($data);
	}

}
