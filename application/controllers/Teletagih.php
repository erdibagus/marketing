<?php date_default_timezone_set('Asia/Jakarta'); ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teletagih extends CI_Controller {

	public function __construct() {
  parent::__construct();
  $this->load->helper('url');
  $this->load->helper('download');
  $this->load->library('pagination');
  $this->load->helper('cookie');
  $this->load->model('sumber_model');
  $this->load->model('teletagih_model');
  $this->load->model('wilayah_model');
  $this->load->model('user_model');
  $this->load->model('kantor_model');
  $this->load->model('nasabah_model');
  $this->load->model('storting_model');
  }
 
    public function ajax_list()
    {
        $list = $this->teletagih_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->tanggal_teletagih.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->kolektabilitas.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->rek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->no_hp.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nominal.'';      
            $row[] = '
			<a class="btn btn-sm btn-primary" href="teletagih/ubah/'.$p->id_teletagih.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_teletagih."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->teletagih_model->count_all(),
                        "recordsFiltered" => $this->teletagih_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_manajer()
    {
        $list = $this->teletagih_model->get_datatables_manajer();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->tanggal_teletagih.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->kolektabilitas.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->rek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->no_hp.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nominal.'';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->teletagih_model->count_all_manajer(),
                        "recordsFiltered" => $this->teletagih_model->count_filtered_manajer(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_user()
    {
        $list = $this->teletagih_model->get_datatables_user();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->tanggal_teletagih.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->kolektabilitas.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->rek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->no_hp.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nominal.'';
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->teletagih_model->count_all_user(),
                        "recordsFiltered" => $this->teletagih_model->count_filtered_user(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
	
	public function index()
	{
		$data['title'] = 'teletagih';

		$this->load->view('templates/header', $data);
		$this->load->view('teletagih/index');
		$this->load->view('templates/footer');
	}

	public function laporan()
	{
		$data['title'] = 'Laporan Teletagih';
        $data['user'] = $this->user_model->data()->result();
		$data['usermanajer'] = $this->user_model->datamanajer()->result();
		$data['kantor'] = $this->kantor_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('teletagih/laporan');
		$this->load->view('templates/footer');
	}

	public function getteletagih()
	{
    	$data = $this->teletagih_model->dataJoin()->result();
    	echo json_encode($data);
	}

	public function filtertgluserkantor($tglawal, $tglakhir, $user, $kantor)
  {
    $list = $this->teletagih_model->get_datatablestgluserkantor($tglawal, $tglakhir, $user, $kantor);
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $p) {
        $no++;
        $row = array();
        $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$no.'';
        $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->tanggal_teletagih.'';
        $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama.'';
        $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama_kantor.'';
        $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->kolektabilitas.'';
        $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->rek.'';
        $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama_nasabah.'';
        $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->alamat.'';
        $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->no_hp.'';
        $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nominal.'';      
        $row[] = '
    <a class="btn btn-sm btn-primary" href="teletagih/ubah/'.$p->id_teletagih.'">Edit</a>
    <a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_teletagih."'".')">Delete</a>';

        $data[] = $row;
    }

    $output = array(
                    "draw" => $_POST['draw'],
                    "recordsTotal" => $this->teletagih_model->count_alltgluserkantor($tglawal, $tglakhir, $user, $kantor),
                    "recordsFiltered" => $this->teletagih_model->count_filteredtgluserkantor($tglawal, $tglakhir, $user, $kantor),
                    "data" => $data,
            );
    //output to json format
    echo json_encode($output);
  }

    public function filtertgluser($tglawal, $tglakhir, $user)
    {
      $list = $this->teletagih_model->get_datatablestgluser($tglawal, $tglakhir, $user);
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $p) {
          $no++;
          $row = array();
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$no.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->tanggal_teletagih.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama_kantor.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->kolektabilitas.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->rek.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama_nasabah.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->alamat.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->no_hp.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nominal.'';      
          $row[] = '
      <a class="btn btn-sm btn-primary" href="teletagih/ubah/'.$p->id_teletagih.'">Edit</a>
      <a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_teletagih."'".')">Delete</a>';
  
          $data[] = $row;
      }
  
      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->teletagih_model->count_alltgluser($tglawal, $tglakhir, $user),
                      "recordsFiltered" => $this->teletagih_model->count_filteredtgluser($tglawal, $tglakhir, $user),
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
    }

    public function filtertglkantor($tglawal, $tglakhir, $kantor)
    {
      $list = $this->teletagih_model->get_datatablestglkantor($tglawal, $tglakhir, $kantor);
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $p) {
          $no++;
          $row = array();
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$no.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->tanggal_teletagih.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama_kantor.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->kolektabilitas.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->rek.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama_nasabah.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->alamat.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->no_hp.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nominal.'';      
          $row[] = '
      <a class="btn btn-sm btn-primary" href="teletagih/ubah/'.$p->id_teletagih.'">Edit</a>
      <a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_teletagih."'".')">Delete</a>';
  
          $data[] = $row;
      }
  
      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->teletagih_model->count_alltglkantor($tglawal, $tglakhir, $kantor),
                      "recordsFiltered" => $this->teletagih_model->count_filteredtglkantor($tglawal, $tglakhir, $kantor),
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
    }

    public function filtertgl($tglawal, $tglakhir)
    {
      $list = $this->teletagih_model->get_datatablestgl($tglawal, $tglakhir);
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $p) {
          $no++;
          $row = array();
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$no.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->tanggal_teletagih.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama_kantor.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->kolektabilitas.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->rek.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama_nasabah.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->alamat.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->no_hp.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nominal.'';      
          $row[] = '
      <a class="btn btn-sm btn-primary" href="teletagih/ubah/'.$p->id_teletagih.'">Edit</a>
      <a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_teletagih."'".')">Delete</a>';
  
          $data[] = $row;
      }
  
      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->teletagih_model->count_alltgl($tglawal, $tglakhir),
                      "recordsFiltered" => $this->teletagih_model->count_filteredtgl($tglawal, $tglakhir),
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
    }

    public function filtertglmanajer($tglawal, $tglakhir)
    {
      $list = $this->teletagih_model->get_datatablestglmanajer($tglawal, $tglakhir);
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $p) {
          $no++;
          $row = array();
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$no.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->tanggal_teletagih.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama_kantor.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->kolektabilitas.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->rek.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nama_nasabah.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->alamat.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->no_hp.'';
          $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_teletagih."'".')">'.$p->nominal.'';      
          $row[] = '
      <a class="btn btn-sm btn-primary" href="teletagih/ubah/'.$p->id_teletagih.'">Edit</a>
      <a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_teletagih."'".')">Delete</a>';
  
          $data[] = $row;
      }
  
      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->teletagih_model->count_alltglmanajer($tglawal, $tglakhir),
                      "recordsFiltered" => $this->teletagih_model->count_filteredtglmanajer($tglawal, $tglakhir),
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
    }

	public function proses_hapus($id)
	{
		$where = array('id_teletagih' => $id );
		
		$this->teletagih_model->hapus_data($where, 'teletagih');
		
		redirect('teletagih');
	}

	public function tambah()
	{
    $data['title'] = 'Teletagih';

    $data['storting'] = $this->storting_model->dataperuser()->result();
		
		$kode = 'TT-' . date('mds');
		$kode_terakhir = $this->teletagih_model->getMax('teletagih', 'id_teletagih', $kode);
		$kode_tambah = substr($kode_terakhir, -2, 2);
		$kode_tambah++;
		$number = str_pad($kode_tambah, 2, '0', STR_PAD_LEFT);
		$data['kode'] = $kode . $number;
        
		$data['tglnow'] = date('Y-m-d H:i:s');

		$this->load->view('templates/header', $data);
		$this->load->view('teletagih/form_tambah');
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		$data['title'] = 'Teletagih';

		$data['nasabah'] = $this->nasabah_model->dataperuser()->result();
    
		//menampilkan data berdasarkan id
		$data['data'] = $this->teletagih_model->detailJoin($id)->result();


		$this->load->view('templates/header', $data);
		$this->load->view('teletagih/form_ubah');
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$data['title'] = 'Teletagih';
    
		//menampilkan data berdasarkan id
		$data['data'] = $this->teletagih_model->detailJoin($id)->result();


		$this->load->view('templates/header', $data);
		$this->load->view('teletagih/detail');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{     
    $config['upload_path']   = './assets/upload/teletagih/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
	
		$namaFile1 = $_FILES['photo1']['name'];
		$error = $_FILES['photo1']['error'];
		$namaFile2 = $_FILES['photo2']['name'];
		$error = $_FILES['photo2']['error'];
		$namaFile3 = $_FILES['photo3']['name'];
		$error = $_FILES['photo3']['error'];
		$namaFile4 = $_FILES['photo4']['name'];
		$error = $_FILES['photo4']['error'];

        $this->load->library('upload', $config);

		$kode = 			$this->input->post('idtm');
		$kpk =				$this->session->userdata('login_session')['kantor_id'];
		$tgl = 				$this->input->post('tgl');
		$nama_nasabah = 	$this->input->post('storting');
		$nominal = 			$this->input->post('nominal');
		$keterangan = 			$this->input->post('keterangan');
		$usrinput = 		$this->session->userdata('login_session')['id_user'];
        
        if ($namaFile1 == '') {
            $ganti1 = 'noimage.png';
        }else{
          if (! $this->upload->do_upload('photo1')) {
            $error = $this->upload->display_errors();
            redirect('teletagih/tambah');
          }
          else{
  
            $data = array('photo1' => $this->upload->data());
            $nama_file= $data['photo1']['file_name'];
            $ganti1 = str_replace(" ", "_", $nama_file);
  
  
          }

      	}

		if ($namaFile2 == '') {
            $ganti2 = 'noimage.png';
        }else{
          if (! $this->upload->do_upload('photo2')) {
            $error = $this->upload->display_errors();
            redirect('teletagih/tambah');
          }
          else{
  
            $data = array('photo2' => $this->upload->data());
            $nama_file= $data['photo2']['file_name'];
            $ganti2 = str_replace(" ", "_", $nama_file);
  
  
          }

      	}

		if ($namaFile3 == '') {
            $ganti3 = 'noimage.png';
        }else{
          if (! $this->upload->do_upload('photo3')) {
            $error = $this->upload->display_errors();
            redirect('teletagih/tambah');
          }
          else{
  
            $data = array('photo3' => $this->upload->data());
            $nama_file= $data['photo3']['file_name'];
            $ganti3 = str_replace(" ", "_", $nama_file);
  
  
          }

      	}

		if ($namaFile4 == '') {
            $ganti4 = 'noimage.png';
        }else{
          if (! $this->upload->do_upload('photo4')) {
            $error = $this->upload->display_errors();
            redirect('teletagih/tambah');
          }
          else{
  
            $data = array('photo4' => $this->upload->data());
            $nama_file= $data['photo4']['file_name'];
            $ganti4 = str_replace(" ", "_", $nama_file);
  
  
          }

      	}
        
		$data=array(
			'id_teletagih'=> $kode,
			'kantor_id'=> $kpk,
			'tanggal_teletagih'=> $tgl,
			'storting_id'=> $nama_nasabah,
			'keterangan' => $keterangan,
			'nominal' => $nominal,
			'user_id' => $usrinput,
      'foto_p1' => $ganti1,
      'foto_p2' => $ganti2,
			'foto_p3' => $ganti3,
      'foto_p4' => $ganti4
		);

		$this->teletagih_model->tambah_data($data, 'teletagih');

    redirect('teletagih');
	}

	public function proses_ubah()
	{     
        $config['upload_path']   = './assets/upload/teletagih/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
	
		$namaFile1 = $_FILES['photo1']['name'];
		$error = $_FILES['photo1']['error'];
		$namaFile2 = $_FILES['photo2']['name'];
		$error = $_FILES['photo2']['error'];
		$namaFile3 = $_FILES['photo3']['name'];
		$error = $_FILES['photo3']['error'];
		$namaFile4 = $_FILES['photo4']['name'];
		$error = $_FILES['photo4']['error'];

        $this->load->library('upload', $config);

		$kode = 			$this->input->post('idtm');
		$tgl = 				$this->input->post('tgl');
		$nama_nasabah = 	$this->input->post('nasabah_id');
		$keterangan = 			$this->input->post('keterangan');
		$kpk = 				$this->input->post('kpk');
		$userid = 			$this->input->post('user');

        if ($namaFile1 == '') {
            $ganti1 = $flama1;
        }else{
          if (! $this->upload->do_upload('photo1')) {
            $error = $this->upload->display_errors();
            redirect('teletagih/tambah');
          }
          else{
  
            $data = array('photo1' => $this->upload->data());
            $nama_file= $data['photo1']['file_name'];
            $ganti1 = str_replace(" ", "_", $nama_file);
  
  
          }

      	}

		if ($namaFile2 == '') {
            $ganti2 = $flama2;
        }else{
          if (! $this->upload->do_upload('photo2')) {
            $error = $this->upload->display_errors();
            redirect('teletagih/tambah');
          }
          else{
  
            $data = array('photo2' => $this->upload->data());
            $nama_file= $data['photo2']['file_name'];
            $ganti2 = str_replace(" ", "_", $nama_file);
  
  
          }

      	}

		if ($namaFile3 == '') {
            $ganti3 = $flama3;
        }else{
          if (! $this->upload->do_upload('photo3')) {
            $error = $this->upload->display_errors();
            redirect('teletagih/tambah');
          }
          else{
  
            $data = array('photo3' => $this->upload->data());
            $nama_file= $data['photo3']['file_name'];
            $ganti3 = str_replace(" ", "_", $nama_file);
  
  
          }

      	}

		if ($namaFile4 == '') {
            $ganti4 = $flama4;
        }else{
          if (! $this->upload->do_upload('photo4')) {
            $error = $this->upload->display_errors();
            redirect('teletagih/tambah');
          }
          else{
  
            $data = array('photo4' => $this->upload->data());
            $nama_file= $data['photo4']['file_name'];
            $ganti4 = str_replace(" ", "_", $nama_file);
          }
      	}

		$data=array(
			'id_teletagih'=> $kode,
			'kantor_id'=> $kpk,
			'tanggal_teletagih'=> $tgl,
			'nasabah_id'=> $nama_nasabah,
			'keterangan' => $keterangan,
			'user_id' => $userid,
      'foto_p1' => $ganti1,
      'foto_p2' => $ganti2,
			'foto_p3' => $ganti3,
      'foto_p4' => $ganti4
		);

		$where = array(
			'id_teletagih'=>$kode
		);

		$this->teletagih_model->ubah_data($where, $data, 'teletagih');
    	redirect('teletagih');
	}
	
}
