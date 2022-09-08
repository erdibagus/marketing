<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sumber extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('sumber_model');
  }
	
	public function index()
	{
		$data['title'] = 'sumber';
		$data['sumber'] = $this->sumber_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('sumber/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$sumber = $this->input->post('sumber');
		
		$data=array(
			'nama_sumber'=> $sumber,
		);

		$this->sumber_model->tambah_data($data, 'sumber');
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
    	redirect('sumber');
	}

	public function proses_ubah()
	{
        $kode = $this->input->post('idsumber');
		$sumber = $this->input->post('sumber');
		
		$data=array(
			'nama_sumber'=> $sumber,
		);

		$where = array(
			'id_sumber'=>$kode
		);

		$this->sumber_model->ubah_data($where, $data, 'sumber');
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
    	redirect('sumber');
	}

	public function proses_hapus($id)
	{
		$where = array('id_sumber' => $id );
		$this->sumber_model->hapus_data($where, 'sumber');
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
		redirect('sumber');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_sumber' => $id );
    	$data = $this->sumber_model->detail_data($where, 'sumber')->result();
    	echo json_encode($data);
	}

}
