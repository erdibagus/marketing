<?php date_default_timezone_set('Asia/Jakarta'); ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penagihan extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('nasabah_model');
	$this->load->model('kolektabilitas_model');
	$this->load->model('penagihan_model');
	$this->load->model('wilayah_model');
	$this->load->model('user_model');
	$this->load->model('storting_model');
	$this->load->model('kantor_model');
  }
 
    public function ajax_list()
    {
        $list = $this->penagihan_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->tanggal_penagihan.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->kolektabilitas.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->rek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nominal.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="penagihan/ubah/'.$p->id_penagihan.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_penagihan."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->penagihan_model->count_all(),
                        "recordsFiltered" => $this->penagihan_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_manajer()
    {
        $list = $this->penagihan_model->get_datatables_manajer();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->tanggal_penagihan.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->kolektabilitas.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->rek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nominal.'';
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->penagihan_model->count_all_manajer(),
                        "recordsFiltered" => $this->penagihan_model->count_filtered_manajer(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_user()
    {
        $list = $this->penagihan_model->get_datatables_user();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->tanggal_penagihan.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->kolektabilitas.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->rek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nominal.'';
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->penagihan_model->count_all_user(),
                        "recordsFiltered" => $this->penagihan_model->count_filtered_user(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
	
	public function index()
	{
		$data['title'] = 'Penagihan';

		$this->load->view('templates/header', $data);
		$this->load->view('penagihan/index');
		$this->load->view('templates/footer');
	}

	public function laporan()
	{
		$data['title'] = 'Laporan Penagihan';
    $data['user'] = $this->user_model->data()->result();
		$data['usermanajer'] = $this->user_model->datamanajer()->result();
		$data['kantor'] = $this->kantor_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('penagihan/laporan');
		$this->load->view('templates/footer');
	}

	public function getpenagihan()
	{
    	$data = $this->penagihan_model->dataJoin()->result();
    	echo json_encode($data);
	}

	public function filtertgluserkantor($tglawal, $tglakhir, $user, $kantor)
	{
		$list = $this->penagihan_model->get_datatablestgluserkantor($tglawal, $tglakhir, $user, $kantor);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->tanggal_penagihan.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->kolektabilitas.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->rek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nominal.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="penagihan/ubah/'.$p->id_penagihan.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_penagihan."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->penagihan_model->count_alltgluserkantor($tglawal, $tglakhir, $user, $kantor),
                        "recordsFiltered" => $this->penagihan_model->count_filteredtgluserkantor($tglawal, $tglakhir, $user, $kantor),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

  public function filtertgluser($tglawal, $tglakhir, $user)
  {
		$list = $this->penagihan_model->get_datatablestgluser($tglawal, $tglakhir, $user);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->tanggal_penagihan.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->kolektabilitas.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->rek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nominal.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="penagihan/ubah/'.$p->id_penagihan.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_penagihan."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->penagihan_model->count_alltgluser($tglawal, $tglakhir, $user),
                        "recordsFiltered" => $this->penagihan_model->count_filteredtgluser($tglawal, $tglakhir, $user),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

  public function filtertglkantor($tglawal, $tglakhir, $kantor)
	{
		$list = $this->penagihan_model->get_datatablestglkantor($tglawal, $tglakhir, $kantor);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->tanggal_penagihan.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->kolektabilitas.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->rek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nominal.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="penagihan/ubah/'.$p->id_penagihan.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_penagihan."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->penagihan_model->count_alltglkantor($tglawal, $tglakhir, $kantor),
                        "recordsFiltered" => $this->penagihan_model->count_filteredtglkantor($tglawal, $tglakhir, $kantor),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

  public function filtertgl($tglawal, $tglakhir)
  {
		$list = $this->penagihan_model->get_datatablestgl($tglawal, $tglakhir);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->tanggal_penagihan.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->kolektabilitas.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->rek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nominal.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="penagihan/ubah/'.$p->id_penagihan.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_penagihan."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->penagihan_model->count_alltgl($tglawal, $tglakhir),
                        "recordsFiltered" => $this->penagihan_model->count_filteredtgl($tglawal, $tglakhir),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

  public function filtertglmanajer($tglawal, $tglakhir)
  {
		$list = $this->penagihan_model->get_datatablestglmanajer($tglawal, $tglakhir);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->tanggal_penagihan.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->kolektabilitas.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->rek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_penagihan."'".')">'.$p->nominal.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="penagihan/ubah/'.$p->id_penagihan.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_penagihan."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->penagihan_model->count_alltglmanajer($tglawal, $tglakhir),
                        "recordsFiltered" => $this->penagihan_model->count_filteredtglmanajer($tglawal, $tglakhir),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function proses_hapus($id)
	{
		$where = array('id_penagihan' => $id );
		$foto1 = $this->penagihan_model->ambilFoto1($where);
		$foto2 = $this->penagihan_model->ambilFoto2($where);
		$foto3 = $this->penagihan_model->ambilFoto3($where);
		$foto4 = $this->penagihan_model->ambilFoto4($where);
		if($foto1){
			if($foto1 == 'noimage.png'){

			}else{
				unlink('./assets/upload/penagihan/'.$foto1.'');
			}
			
			$this->penagihan_model->hapus_data($where, 'penagihan');
		}

		if($foto2){
			if($foto2 == 'noimage.png'){

			}else{
				unlink('./assets/upload/penagihan/'.$foto2.'');
			}
			
			$this->penagihan_model->hapus_data($where, 'penagihan');
		}

		if($foto3){
			if($foto3 == 'noimage.png'){

			}else{
				unlink('./assets/upload/penagihan/'.$foto3.'');
			}
			
			$this->penagihan_model->hapus_data($where, 'penagihan');
		}

		if($foto4){
			if($foto4 == 'noimage.png'){

			}else{
				unlink('./assets/upload/penagihan/'.$foto4.'');
			}
			
			$this->penagihan_model->hapus_data($where, 'penagihan');
		}
		redirect('penagihan');
	}

	public function tambah()
	{
    $data['title'] = 'penagihan';

		$data['storting'] = $this->storting_model->dataperuser()->result();
		
		$kode = 'PE-' . date('mds');
		$kode_terakhir = $this->penagihan_model->getMax('penagihan', 'id_penagihan', $kode);
		$kode_tambah = substr($kode_terakhir, -2, 2);
		$kode_tambah++;
		$number = str_pad($kode_tambah, 2, '0', STR_PAD_LEFT);
		$data['kode'] = $kode . $number;
        
		$data['tglnow'] = date('Y-m-d H:i:s');

		$this->load->view('templates/header', $data);
		$this->load->view('penagihan/form_tambah');
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		$data['title'] = 'penagihan';

		$data['nasabah'] = $this->nasabah_model->data()->result();
        $data['jmlnasabah'] = $this->nasabah_model->data()->num_rows();
        
        $data['kolektabilitas'] = $this->kolektabilitas_model->data()->result();
        $data['jmlkolektabilitas'] = $this->kolektabilitas_model->data()->num_rows();
    
		//menampilkan data berdasarkan id
		$data['data'] = $this->penagihan_model->detailJoin($id)->result();


		$this->load->view('templates/header', $data);
		$this->load->view('penagihan/form_ubah');
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$data['title'] = 'penagihan';
    
		//menampilkan data berdasarkan id
		$data['data'] = $this->penagihan_model->detailJoin($id)->result();


		$this->load->view('templates/header', $data);
		$this->load->view('penagihan/detail');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{

        $config['upload_path']   = './assets/upload/penagihan/';
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
        
		$kode = 			$this->input->post('idpe');
		$kpk =				$this->session->userdata('login_session')['kantor_id'];
		$tgl = 				$this->input->post('tgl');
		$nasabah = 			$this->input->post('storting');
		$keterangan = 		$this->input->post('keterangan');
		$nominal = 			$this->input->post('nominal');
		$lokasi = 			$this->input->post('lokasi');
		$lat = 			    $this->input->post('lat');
		$long = 			$this->input->post('long');
		$usrinput = 		$this->session->userdata('login_session')['id_user'];
        
        if ($namaFile1 == '') {
            $ganti1 = 'noimage.png';
        }else{
          if (! $this->upload->do_upload('photo1')) {
            $error = $this->upload->display_errors();
            redirect('penagihan/tambah');
          }
          else{
  
            $data = array('photo1' => $this->upload->data());
            $config['image_library']='gd2';
            $config['source_image']='./assets/upload/penagihan/'.$data['photo1']['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '85%';
            $config['width']= 1000;
            $config['height']= 1000;
            $config['new_image']= './assets/upload/penagihan/'.$data['photo1']['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $nama_file= $data['photo1']['file_name'];
            $ganti1 = str_replace(" ", "_", $nama_file);
  
  
          }

      	}

		if ($namaFile2 == '') {
            $ganti2 = 'noimage.png';
        }else{
          if (! $this->upload->do_upload('photo2')) {
            $error = $this->upload->display_errors();
            redirect('penagihan/tambah');
          }
          else{
  
            $data = array('photo2' => $this->upload->data());
            $config['image_library']='gd2';
            $config['source_image']='./assets/upload/penagihan/'.$data['photo2']['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '85%';
            $config['width']= 1000;
            $config['height']= 1000;
            $config['new_image']= './assets/upload/penagihan/'.$data['photo2']['file_name'];
            $this->load->library('image_lib2', $config);
            $this->image_lib2->resize();
            $nama_file= $data['photo2']['file_name'];
            $ganti2 = str_replace(" ", "_", $nama_file);
  
  
          }

      	}

		if ($namaFile3 == '') {
            $ganti3 = 'noimage.png';
        }else{
          if (! $this->upload->do_upload('photo3')) {
            $error = $this->upload->display_errors();
            redirect('penagihan/tambah');
          }
          else{
  
            $data = array('photo3' => $this->upload->data());
            $config['image_library']='gd2';
            $config['source_image']='./assets/upload/penagihan/'.$data['photo3']['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '85%';
            $config['width']= 1000;
            $config['height']= 1000;
            $config['new_image']= './assets/upload/penagihan/'.$data['photo3']['file_name'];
            $this->load->library('image_lib3', $config);
            $this->image_lib3->resize();
            $nama_file= $data['photo3']['file_name'];
            $ganti3 = str_replace(" ", "_", $nama_file);
  
  
          }

      	}

		if ($namaFile4 == '') {
            $ganti4 = 'noimage.png';
        }else{
          if (! $this->upload->do_upload('photo4')) {
            $error = $this->upload->display_errors();
            redirect('penagihan/tambah');
          }
          else{
  
            $data = array('photo4' => $this->upload->data());
            $config['image_library']='gd2';
            $config['source_image']='./assets/upload/penagihan/'.$data['photo4']['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '85%';
            $config['width']= 1000;
            $config['height']= 1000;
            $config['new_image']= './assets/upload/penagihan/'.$data['photo4']['file_name'];
            $this->load->library('image_lib4', $config);
            $this->image_lib4->resize();
            $nama_file= $data['photo4']['file_name'];
            $ganti4 = str_replace(" ", "_", $nama_file);
  
  
          }

      	}
		$data=array(
			'id_penagihan'=> $kode,
			'kantor_id'=> $kpk,
			'tanggal_penagihan'=> $tgl,
			'storting_id'=> $nasabah,
			'keterangan' => $keterangan,
			'nominal' => $nominal,
			'lokasi' => $lokasi,
			'lati' => $lat,
			'longi' => $long,
			'user_id' => $usrinput,
            'foto_p1' => $ganti1,
            'foto_p2' => $ganti2,
			'foto_p3' => $ganti3,
            'foto_p4' => $ganti4
		);

		$this->penagihan_model->tambah_data($data, 'penagihan');
    	redirect('penagihan');
	}

	public function proses_ubah()
	{
        $config['upload_path']   = './assets/upload/penagihan/';
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
        
		$kode = 			$this->input->post('idp');
		$tgl = 				$this->input->post('tgl');
		$kategori =			$this->input->post('kategori');
		$nama_nasabah = 	$this->input->post('nama_nasabah');
		$alamat = 			$this->input->post('alamat');
		$no_tlp = 			$this->input->post('no_tlp');
		$hasil = 			$this->input->post('hasil');
		$kpk = 				$this->input->post('kpk');
		$userid = 			$this->input->post('user');
		$lokasi = 			$this->input->post('lokasi');
        $flama1 = 			$this->input->post('fotoLama1');
        $flama2 = 			$this->input->post('fotoLama2');
        $flama3 = 			$this->input->post('fotoLama3');
        $flama4 = 			$this->input->post('fotoLama4');

        if ($namaFile1 == '') {
            $ganti1 = $flama1;
        }else{
          if (! $this->upload->do_upload('photo1')) {
            $error = $this->upload->display_errors();
            redirect('penagihan/tambah');
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
            redirect('penagihan/tambah');
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
            redirect('penagihan/tambah');
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
            redirect('penagihan/tambah');
          }
          else{
  
            $data = array('photo4' => $this->upload->data());
            $nama_file= $data['photo4']['file_name'];
            $ganti4 = str_replace(" ", "_", $nama_file);
          }
      	}
		
		$data=array(
			'id_penagihan'=> $kode,
			'kantor_id'=> $kpk,
			'tanggal_penagihan'=> $tgl,
			'kategori_id' => $kategori,
			'nama_nasabah'=> $nama_nasabah,
			'alamat'=> $alamat,
			'kolektabilitas_id' => $kolektabilitas,
			'hasil' => $hasil,
			'no_tlp' => $no_tlp,
			'user_id' => $userid,
			'lokasi' => $lokasi,
            'foto_p1' => $ganti1,
            'foto_p2' => $ganti2,
			'foto_p3' => $ganti3,
            'foto_p4' => $ganti4
		);

		$where = array(
			'id_penagihan'=>$kode
		);

		$this->penagihan_model->ubah_data($where, $data, 'penagihan');
    	redirect('penagihan');
	}
	
}
