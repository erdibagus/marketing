<?php date_default_timezone_set('Asia/Jakarta'); ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prospek extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('kategori_model');
	$this->load->model('prospek_model');
	$this->load->model('wilayah_model');
	$this->load->model('user_model');
	$this->load->model('kantor_model');
	$this->load->model('nasabah_prospek_model');
  }
 
    public function ajax_list()
    {
        $list = $this->prospek_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->tanggal_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->no_tlp.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="prospek/ubah/'.$p->id_prospek.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_prospek."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->prospek_model->count_all(),
                        "recordsFiltered" => $this->prospek_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_user()
    {
        $list = $this->prospek_model->get_datatables_user();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->tanggal_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->no_tlp.'';
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->prospek_model->count_all_user(),
                        "recordsFiltered" => $this->prospek_model->count_filtered_user(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_manajer()
    {
        $list = $this->prospek_model->get_datatables_manajer();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->tanggal_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->no_tlp.'';
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->prospek_model->count_all_manajer(),
                        "recordsFiltered" => $this->prospek_model->count_filtered_manajer(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
	
	public function index()
	{
		$data['title'] = 'Prospek';

		$this->load->view('templates/header', $data);
		$this->load->view('prospek/index');
		$this->load->view('templates/footer');
	}

	public function laporan()
	{
		$data['title'] = 'Laporan Prospek';
		$data['user'] = $this->user_model->data()->result();
		$data['usermanajer'] = $this->user_model->datamanajer()->result();
		$data['kantor'] = $this->kantor_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('prospek/laporan');
		$this->load->view('templates/footer');
	}

	public function getprospek()
	{
    	$data = $this->prospek_model->dataJoin()->result();
    	echo json_encode($data);
	}

	public function filtertgluserkantor($tglawal, $tglakhir, $user, $kantor)
    {
        $list = $this->prospek_model->get_datatablestgluserkantor($tglawal, $tglakhir, $user, $kantor);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->tanggal_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->no_tlp.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="prospek/ubah/'.$p->id_prospek.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_prospek."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->prospek_model->count_alltgluserkantor($tglawal, $tglakhir, $user, $kantor),
                        "recordsFiltered" => $this->prospek_model->count_filteredtgluserkantor($tglawal, $tglakhir, $user, $kantor),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function filtertgluser($tglawal, $tglakhir, $user)
    {
        $list = $this->prospek_model->get_datatablestgluser($tglawal, $tglakhir, $user);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->tanggal_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->no_tlp.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="prospek/ubah/'.$p->id_prospek.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_prospek."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->prospek_model->count_alltgluser($tglawal, $tglakhir, $user),
                        "recordsFiltered" => $this->prospek_model->count_filteredtgluser($tglawal, $tglakhir, $user),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function filtertglkantor($tglawal, $tglakhir, $kantor)
	{
        $list = $this->prospek_model->get_datatablestglkantor($tglawal, $tglakhir, $kantor);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->tanggal_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->no_tlp.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="prospek/ubah/'.$p->id_prospek.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_prospek."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->prospek_model->count_alltglkantor($tglawal, $tglakhir, $kantor),
                        "recordsFiltered" => $this->prospek_model->count_filteredtglkantor($tglawal, $tglakhir, $kantor),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
	
	public function filtertgl($tglawal, $tglakhir)
    {
        $list = $this->prospek_model->get_datatablestgl($tglawal, $tglakhir);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->tanggal_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->no_tlp.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="prospek/ubah/'.$p->id_prospek.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_prospek."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->prospek_model->count_alltgl($tglawal, $tglakhir),
                        "recordsFiltered" => $this->prospek_model->count_filteredtgl($tglawal, $tglakhir),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function filtertglmanajer($tglawal, $tglakhir)
    {
        $list = $this->prospek_model->get_datatablestglmanajer($tglawal, $tglakhir);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->tanggal_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_prospek."'".')">'.$p->no_tlp.'';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->prospek_model->count_alltglmanajer($tglawal, $tglakhir),
                        "recordsFiltered" => $this->prospek_model->count_filteredtglmanajer($tglawal, $tglakhir),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function proses_hapus($id)
	{
		$where = array('id_prospek' => $id );
		$foto1 = $this->prospek_model->ambilFoto1($where);
		$foto2 = $this->prospek_model->ambilFoto2($where);
		$foto3 = $this->prospek_model->ambilFoto3($where);
		$foto4 = $this->prospek_model->ambilFoto4($where);
		if($foto1){
			if($foto1 == 'noimage.png'){

			}else{
				unlink('./assets/upload/prospek/'.$foto1.'');
			}
			
			$this->prospek_model->hapus_data($where, 'prospek');
		}

		if($foto2){
			if($foto2 == 'noimage.png'){

			}else{
				unlink('./assets/upload/prospek/'.$foto2.'');
			}
			
			$this->prospek_model->hapus_data($where, 'prospek');
		}

		if($foto3){
			if($foto3 == 'noimage.png'){

			}else{
				unlink('./assets/upload/prospek/'.$foto3.'');
			}
			
			$this->prospek_model->hapus_data($where, 'prospek');
		}

		if($foto4){
			if($foto4 == 'noimage.png'){

			}else{
				unlink('./assets/upload/prospek/'.$foto4.'');
			}
			
			$this->prospek_model->hapus_data($where, 'prospek');
		}
		redirect('prospek');
	}

	public function tambah()
	{
        $data['title'] = 'Prospek';

		$data['kategori'] = $this->kategori_model->data()->result();
        $data['jmlkategori'] = $this->kategori_model->data()->num_rows();

        $data['nasabah'] = $this->nasabah_prospek_model->dataperuser()->result();
		
		$kode = 'PR-' . date('mds');
		$kode_terakhir = $this->prospek_model->getMax('prospek', 'id_prospek', $kode);
		$kode_tambah = substr($kode_terakhir, -2, 2);
		$kode_tambah++;
		$number = str_pad($kode_tambah, 2, '0', STR_PAD_LEFT);
		$data['kode'] = $kode . $number;
        
		$data['tglnow'] = date('Y-m-d H:i:s');

		$this->load->view('templates/header', $data);
		$this->load->view('prospek/form_tambah');
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		$data['title'] = 'Prospek';
        
		$data['kategori'] = $this->kategori_model->data()->result();
        $data['jmlkategori'] = $this->kategori_model->data()->num_rows();
    
        $data['nasabah'] = $this->nasabah_prospek_model->data()->result();
		//menampilkan data berdasarkan id
		$data['data'] = $this->prospek_model->detailJoin($id)->result();


		$this->load->view('templates/header', $data);
		$this->load->view('prospek/form_ubah');
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$data['title'] = 'Prospek';
    
		//menampilkan data berdasarkan id
		$data['data'] = $this->prospek_model->detailJoin($id)->result();


		$this->load->view('templates/header', $data);
		$this->load->view('prospek/detail');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{

        $config['upload_path']   = './assets/upload/prospek/';
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
		$kpk =				$this->session->userdata('login_session')['kantor_id'];
		$tgl = 				$this->input->post('tgl');
		$kategori =			$this->input->post('kategori');
		$nasabah_id = 	    $this->input->post('nasabah_id');
		$hasil = 			$this->input->post('hasil');
		$lokasi = 			$this->input->post('lokasi');
		$lat = 			$this->input->post('lat');
		$long = 			$this->input->post('long');
		$usrinput = 		$this->session->userdata('login_session')['id_user'];
        
        if ($namaFile1 == '') {
            $ganti1 = 'noimage.png';
        }else{
          if (! $this->upload->do_upload('photo1')) {
            $error = $this->upload->display_errors();
            redirect('prospek/tambah');
          }
          else {
            $data = array('photo1' => $this->upload->data());
            $config['image_library']='gd2';
            $config['source_image']='./assets/upload/prospek/'.$data['photo1']['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '85%';
            $config['width']= 1000;
            $config['height']= 1000;
            $config['new_image']= './assets/upload/prospek/'.$data['photo1']['file_name'];
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
            redirect('prospek/tambah');
          }
          else{
  
            $data = array('photo2' => $this->upload->data());
            $config['image_library']='gd2';
            $config['source_image']='./assets/upload/prospek/'.$data['photo2']['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '85%';
            $config['width']= 1000;
            $config['height']= 1000;
            $config['new_image']= './assets/upload/prospek/'.$data['photo2']['file_name'];
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
            redirect('prospek/tambah');
          }
          else{
  
            $data = array('photo3' => $this->upload->data());
            $config['image_library']='gd2';
            $config['source_image']='./assets/upload/prospek/'.$data['photo3']['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '85%';
            $config['width']= 1000;
            $config['height']= 1000;
            $config['new_image']= './assets/upload/prospek/'.$data['photo3']['file_name'];
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
            redirect('prospek/tambah');
          }
          else{
  
            $data = array('photo4' => $this->upload->data());
            $config['image_library']='gd2';
            $config['source_image']='./assets/upload/prospek/'.$data['photo4']['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '85%';
            $config['width']= 1000;
            $config['height']= 1000;
            $config['new_image']= './assets/upload/prospek/'.$data['photo4']['file_name'];
            $this->load->library('image_lib4', $config);
            $this->image_lib4->resize();
            $nama_file= $data['photo4']['file_name'];
            $ganti4 = str_replace(" ", "_", $nama_file);
  
  
          }

      	}
		$data=array(
			'id_prospek'=> $kode,
			'kpk'=> $kpk,
			'tanggal_prospek'=> $tgl,
			'kategori_id' => $kategori,
			'nasabah_id'=> $nasabah_id,
			'hasil' => $hasil,
			'lokasi' => $lokasi,
			'lati' => $lat,
			'longi' => $long,
			'user_id' => $usrinput,
            'foto_p1' => $ganti1,
            'foto_p2' => $ganti2,
			'foto_p3' => $ganti3,
            'foto_p4' => $ganti4
		);

		$this->prospek_model->tambah_data($data, 'prospek');
    	redirect('prospek');
	}

	public function proses_ubah()
	{
        $config['upload_path']   = './assets/upload/prospek/';
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
		$nasabah_id = 	$this->input->post('nasabah_id');
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
            redirect('prospek/tambah');
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
            redirect('prospek/tambah');
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
            redirect('prospek/tambah');
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
            redirect('prospek/tambah');
          }
          else{
  
            $data = array('photo4' => $this->upload->data());
            $nama_file= $data['photo4']['file_name'];
            $ganti4 = str_replace(" ", "_", $nama_file);
          }
      	}
		
		$data=array(
			'id_prospek'=> $kode,
			'kpk'=> $kpk,
			'tanggal_prospek'=> $tgl,
			'kategori_id' => $kategori,
			'nasabah_id'=> $nasabah_id,
			'hasil' => $hasil,
			'kpk' => $kpk,
			'user_id' => $userid,
			'lokasi' => $lokasi,
            'foto_p1' => $ganti1,
            'foto_p2' => $ganti2,
			'foto_p3' => $ganti3,
            'foto_p4' => $ganti4
		);

		$where = array(
			'id_prospek'=>$kode
		);

		$this->prospek_model->ubah_data($where, $data, 'prospek');
    	redirect('prospek');
	}
	
}
