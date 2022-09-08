<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kantor extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('kantor_model');
  }
	
	public function index()
	{
		$data['title'] = 'Kantor';
		$data['kantor'] = $this->kantor_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('kantor/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$kantor = $this->input->post('kantor');
		
		$data=array(
			'nama_kantor'=> $kantor,
		);

		$this->kantor_model->tambah_data($data, 'kantor');
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
    	redirect('kantor');
	}

	public function proses_ubah()
	{
        $kode = $this->input->post('idkantor');
		$kantor = $this->input->post('kantor');
		
		$data=array(
			'nama_kantor'=> $kantor,
		);

		$where = array(
			'id_kantor'=>$kode
		);

		$this->kantor_model->ubah_data($where, $data, 'kantor');
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
    	redirect('kantor');
	}

	public function proses_hapus($id)
	{
		$where = array('id_kantor' => $id );
		$this->kantor_model->hapus_data($where, 'kantor');
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
		redirect('kantor');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_kantor' => $id );
    	$data = $this->kantor_model->detail_data($where, 'kantor')->result();
    	echo json_encode($data);
	}

}
