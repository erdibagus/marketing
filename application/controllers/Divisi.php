<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('divisi_model');
  }
	
	public function index()
	{
		$data['title'] = 'Divisi';
		$data['divisi'] = $this->divisi_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('divisi/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$divisi = $this->input->post('divisi');
		
		$data=array(
			'nama_divisi'=> $divisi,
		);

		$this->divisi_model->tambah_data($data, 'divisi');
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
    	redirect('divisi');
	}

	public function proses_ubah()
	{
        $kode = $this->input->post('iddivisi');
		$divisi = $this->input->post('divisi');
		
		$data=array(
			'nama_divisi'=> $divisi,
		);

		$where = array(
			'id_divisi'=>$kode
		);

		$this->divisi_model->ubah_data($where, $data, 'divisi');
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
    	redirect('divisi');
	}

	public function proses_hapus($id)
	{
		$where = array('id_divisi' => $id );
		$this->divisi_model->hapus_data($where, 'divisi');
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
		redirect('divisi');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_divisi' => $id );
    	$data = $this->divisi_model->detail_data($where, 'divisi')->result();
    	echo json_encode($data);
	}

}
