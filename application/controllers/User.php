<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class User extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('user_model');
	$this->load->model('divisi_model');
	$this->load->model('kantor_model');
  }
	
	public function index()
	{
		$data['title'] = 'User';
		$data['user'] = $this->user_model->dataJoin()->result();
		$data['usermanajer'] = $this->user_model->dataJoinmanajer()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('user/index');
		$this->load->view('templates/footer');
    }

    public function tambah()
	{
        $data['title'] = 'User';
		$data['divisi'] = $this->divisi_model->data()->result();
		$data['kantor'] = $this->kantor_model->data()->result();
		$data['jmlDivisi'] = $this->divisi_model->data()->num_rows();
		$data['jmlKantor'] = $this->kantor_model->data()->num_rows();
        
		$this->load->view('templates/header', $data);
		$this->load->view('user/form_tambah');
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		$data['title'] = 'User';
		$where = array('id_user'=>$id);
		$data['user'] = $this->user_model->detail_data($id)->result();
		$data['divisi'] = $this->divisi_model->data()->result();
		$data['kantor'] = $this->kantor_model->data()->result();
		$data['jmlDivisi'] = $this->divisi_model->data()->num_rows();
		$data['jmlKantor'] = $this->kantor_model->data()->num_rows();


		$this->load->view('templates/header', $data);
		$this->load->view('user/form_ubah');
		$this->load->view('templates/footer');
	}

	public function detail_data($id)
  {
    $data['title'] = 'User';
	$data['data'] = $this->user_model->detail_data($id)->result();

    $this->load->view('templates/header', $data);
    $this->load->view('user/detail');
    $this->load->view('templates/footer');
  }

	public function proses_hapus($id)
	{
		$where = array('id_user' => $id );
		$foto = $this->user_model->ambilFoto($where);
		if($foto){
			if($foto == 'user.png'){

			}else{
				unlink('./assets/upload/pengguna/'.$foto.'');
			}
			
			$this->user_model->hapus_data($where, 'user');
		}
		
		
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
		redirect('user');
	}
	
	public function proses_tambah()
	{
		
		$config['upload_path']   = './assets/upload/pengguna/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
	
		$namaFile = $_FILES['photo']['name'];
		$error = $_FILES['photo']['error'];

		$this->load->library('upload', $config);
		
		$kode = $this->user_model->buat_kode(); 
		$namaL = $this->input->post('namaL');
		$user = $this->input->post('user');
		$kantor = $this->input->post('kantor');
		$divisi = $this->input->post('divisi');
		$level = $this->input->post('level');
		$pass = $this->input->post('pwd');
		$status = "Aktif";
	
	
		if ($namaFile == '') {
		  	$ganti = 'user.png';
		}else{
			if (! $this->upload->do_upload('photo')) {
			  $error = $this->upload->display_errors();
		  	redirect('user/tambah');
			}
			else{
	
			  $data = array('photo' => $this->upload->data());
			  $nama_file= $data['photo']['file_name'];
			  $ganti = str_replace(" ", "_", $nama_file);
	
	
			}

		}

		$data=array(
			'id_user'=>$kode,
			'nama'=>$namaL,
			'username'=>$user,
			'level'=>$level,
			'kantor_id'=>$kantor,
			'divisi_id'=>$divisi,
			'password'=>md5($pass),
			'status'=>$status,
			'foto'=>$ganti
				);
	  
		  $this->user_model->tambah_data($data, 'user');
		  $this->session->set_flashdata('Pesan','
			<script>
			$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
			});
			</script>
			');
		  redirect('user');

	}

	public function proses_ubah()
	{
		$config['upload_path']   = './assets/upload/pengguna/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
	
		$namaFile = $_FILES['photo']['name'];
		$error = $_FILES['photo']['error'];
	

		$this->load->library('upload', $config);
		
		
		$kode = $this->input->post('iduser');
		$namaL = $this->input->post('namaL');
		$user = $this->input->post('user');
		$level = $this->input->post('level');
		$kantor = $this->input->post('kantor');
		$divisi = $this->input->post('divisi');
		$status = $this->input->post('status');
		$pass = $this->input->post('pwd');
		$passLama = $this->input->post('pwdLama');

		$flama = $this->input->post('fotoLama');

		if($pass == ''){
			$passUpdate = $passLama;
		}else{
			$passUpdate = md5($pass);
		}
	
	
		if ($namaFile == '') {
		  	$ganti = $flama;
		}else{
			if (! $this->upload->do_upload('photo')) {
			  $error = $this->upload->display_errors();
		  	redirect('user/ubah/'.$kode);
			}
			else{
			  $data = array('photo' => $this->upload->data());
			  $nama_file= $data['photo']['file_name'];
			  $ganti = str_replace(" ", "_", $nama_file);
			  if($flama !== 'user.png'){
				unlink('./assets/upload/pengguna/'.$flama.'');
			  }
	
			}

		}

		$data=array(
			'nama'=>$namaL,
			'username'=>$user,
			'level'=>$level,
			'kantor_id'=>$kantor,
			'divisi_id'=>$divisi,
			'password'=>$passUpdate,
			'status'=>$status,
			'foto'=>$ganti
				);

		$where = array('id_user'=>$kode);
	  
		  $this->user_model->ubah_data($where, $data, 'user');
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
		  redirect('user');
	}
    
	public function import_user()
	{
		$upload_file=$_FILES['userfile']['name'];
		$extension=pathinfo($upload_file,PATHINFO_EXTENSION);
		if($extension=='csv')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else if($extension=='xls')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}
		$spreadsheet=$reader->load($_FILES['userfile']['tmp_name']);
		$sheetdata=$spreadsheet->getActiveSheet()->toArray();
		$sheetcount=count($sheetdata);
		if($sheetcount>1)
		{
			$data=array();
			for ($i=1; $i < $sheetcount; $i++) { 
				$id=$sheetdata[$i][0];
				$nama=$sheetdata[$i][1];
				$username=$sheetdata[$i][2];
				$level=$sheetdata[$i][3];
				$password=$sheetdata[$i][4];
				$foto=$sheetdata[$i][5];
				$kantor=$sheetdata[$i][6];
				$divisi=$sheetdata[$i][7];
				$status=$sheetdata[$i][8];
				$data[]=array(
					'id_user'=>$id,
					'nama'=>$nama,
					'username'=>$username,
					'level'=>$level,
					'password'=>$password,
					'foto'=>$foto,
					'kantor_id'=>$kantor,
					'divisi_id'=>$divisi,
					'status'=>$status,
				);
			}
			$inserdata=$this->user_model->insert_batch($data);
			if($inserdata)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success">Successfully Added.</div>');
				redirect('home');
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger">Data Not uploaded. Please Try Again.</div>');
				redirect('home');
			}
		}
	}
	
}