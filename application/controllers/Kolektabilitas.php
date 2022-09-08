<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kolektabilitas extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('kolektabilitas_model');
  }
	
	public function index()
	{
		$data['title'] = 'Kolektabilitas';
		$data['kolektabilitas'] = $this->kolektabilitas_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('kolektabilitas/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$kolektabilitas = $this->input->post('kolektabilitas');
		
		$data=array(
			'nama_kolektabilitas'=> $kolektabilitas,
		);

		$this->kolektabilitas_model->tambah_data($data, 'kolektabilitas');
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
    	redirect('kolektabilitas');
	}

	public function proses_ubah()
	{
        $kode = $this->input->post('idkolektabilitas');
		$kolektabilitas = $this->input->post('kolektabilitas');
		
		$data=array(
			'nama_kolektabilitas'=> $kolektabilitas,
		);

		$where = array(
			'id_kolektabilitas'=>$kode
		);

		$this->kolektabilitas_model->ubah_data($where, $data, 'kolektabilitas');
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
    	redirect('kolektabilitas');
	}

	public function proses_hapus($id)
	{
		$where = array('id_kolektabilitas' => $id );
		$this->kolektabilitas_model->hapus_data($where, 'kolektabilitas');
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
		redirect('kolektabilitas');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_kolektabilitas' => $id );
    	$data = $this->kolektabilitas_model->detail_data($where, 'kolektabilitas')->result();
    	echo json_encode($data);
	}

}
