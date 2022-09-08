<?php date_default_timezone_set('Asia/Jakarta'); ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('kategori_model');
	$this->load->model('agunan_model');
	$this->load->model('sistem_pinjam_model');
	$this->load->model('survey_model');
	$this->load->model('wilayah_model');
	$this->load->model('user_model');
	$this->load->model('kantor_model');
	$this->load->model('nasabah_prospek_model');
  }
 
    public function ajax_list()
    {
        $list = $this->survey_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->tanggal_survey.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_sistem_pinjam.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->jangka.' Bulan';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->tujuan.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->usaha.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->plafon.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="survey/ubah/'.$p->id_survey.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_survey."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->survey_model->count_all(),
                        "recordsFiltered" => $this->survey_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_manajer()
    {
        $list = $this->survey_model->get_datatables_manajer();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->tanggal_survey.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_sistem_pinjam.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->jangka.' Bulan';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->tujuan.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->usaha.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->plafon.'';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->survey_model->count_all_manajer(),
                        "recordsFiltered" => $this->survey_model->count_filtered_manajer(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_user()
    {
        $list = $this->survey_model->get_datatables_user();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->tanggal_survey.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_sistem_pinjam.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->jangka.' Bulan';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->tujuan.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->usaha.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->plafon.'';
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->survey_model->count_all_user(),
                        "recordsFiltered" => $this->survey_model->count_filtered_user(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
	
	public function index()
	{
		$data['title'] = 'Survey';

		$this->load->view('templates/header', $data);
		$this->load->view('survey/index');
		$this->load->view('templates/footer');
	}

	public function laporan()
	{
		$data['title'] = 'Laporan Survey';
        $data['user'] = $this->user_model->data()->result();
		$data['usermanajer'] = $this->user_model->datamanajer()->result();
		$data['kantor'] = $this->kantor_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('survey/laporan');
		$this->load->view('templates/footer');
	}

	public function getsurvey()
	{
    	$data = $this->survey_model->dataJoin()->result();
    	echo json_encode($data);
	}

	public function filtertgluserkantor($tglawal, $tglakhir, $user, $kantor)
    {
        $list = $this->survey_model->get_datatablestgluserkantor($tglawal, $tglakhir, $user, $kantor);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->tanggal_survey.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_sistem_pinjam.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->jangka.' Bulan';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->tujuan.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->usaha.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->plafon.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="survey/ubah/'.$p->id_survey.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_survey."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->survey_model->count_alltgluserkantor($tglawal, $tglakhir, $user, $kantor),
                        "recordsFiltered" => $this->survey_model->count_filteredtgluserkantor($tglawal, $tglakhir, $user, $kantor),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function filtertgluser($tglawal, $tglakhir, $user)
    {
        $list = $this->survey_model->get_datatablestgluser($tglawal, $tglakhir, $user);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->tanggal_survey.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_sistem_pinjam.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->jangka.' Bulan';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->tujuan.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->usaha.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->plafon.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="survey/ubah/'.$p->id_survey.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_survey."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->survey_model->count_alltgluser($tglawal, $tglakhir, $user),
                        "recordsFiltered" => $this->survey_model->count_filteredtgluser($tglawal, $tglakhir, $user),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function filtertglkantor($tglawal, $tglakhir, $kantor)
    {
        $list = $this->survey_model->get_datatablestglkantor($tglawal, $tglakhir, $kantor);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->tanggal_survey.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_sistem_pinjam.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->jangka.' Bulan';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->tujuan.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->usaha.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->plafon.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="survey/ubah/'.$p->id_survey.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_survey."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->survey_model->count_alltglkantor($tglawal, $tglakhir, $kantor),
                        "recordsFiltered" => $this->survey_model->count_filteredtglkantor($tglawal, $tglakhir, $kantor),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function filtertgl($tglawal, $tglakhir)
    {
        $list = $this->survey_model->get_datatablestgl($tglawal, $tglakhir);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->tanggal_survey.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_sistem_pinjam.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->jangka.' Bulan';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->tujuan.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->usaha.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->plafon.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="survey/ubah/'.$p->id_survey.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_survey."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->survey_model->count_alltgl($tglawal, $tglakhir),
                        "recordsFiltered" => $this->survey_model->count_filteredtgl($tglawal, $tglakhir),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function filtertglmanajer($tglawal, $tglakhir)
    {
        $list = $this->survey_model->get_datatablestglmanajer($tglawal, $tglakhir);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->tanggal_survey.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->nama_sistem_pinjam.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->jangka.' Bulan';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->tujuan.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->usaha.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_survey."'".')">'.$p->plafon.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="survey/ubah/'.$p->id_survey.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_survey."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->survey_model->count_alltglmanajer($tglawal, $tglakhir),
                        "recordsFiltered" => $this->survey_model->count_filteredtglmanajer($tglawal, $tglakhir),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function proses_hapus($id)
	{
		$where = array('id_survey' => $id );
		$foto1 = $this->survey_model->ambilFoto1($where);
		$foto2 = $this->survey_model->ambilFoto2($where);
		$foto3 = $this->survey_model->ambilFoto3($where);
		$foto4 = $this->survey_model->ambilFoto4($where);
		if($foto1){
			if($foto1 == 'noimage.png'){

			}else{
				unlink('./assets/upload/survey/'.$foto1.'');
			}
			
			$this->survey_model->hapus_data($where, 'survey');
		}

		if($foto2){
			if($foto2 == 'noimage.png'){

			}else{
				unlink('./assets/upload/survey/'.$foto2.'');
			}
			
			$this->survey_model->hapus_data($where, 'survey');
		}

		if($foto3){
			if($foto3 == 'noimage.png'){

			}else{
				unlink('./assets/upload/survey/'.$foto3.'');
			}
			
			$this->survey_model->hapus_data($where, 'survey');
		}

		if($foto4){
			if($foto4 == 'noimage.png'){

			}else{
				unlink('./assets/upload/survey/'.$foto4.'');
			}
			
			$this->survey_model->hapus_data($where, 'survey');
		}
		redirect('survey');
	}

	public function tambah()
	{
        $data['title'] = 'Survey';

        $data['provinsi'] = $this->wilayah_model->getDataProv();
		$data['kategori'] = $this->kategori_model->data()->result();
        $data['jmlkategori'] = $this->kategori_model->data()->num_rows();

		$data['agunan'] = $this->agunan_model->data()->result();
        $data['jmlagunan'] = $this->agunan_model->data()->num_rows();

		$data['sistempinjam'] = $this->sistem_pinjam_model->data()->result();
        $data['jmlsistempinjam'] = $this->sistem_pinjam_model->data()->num_rows();
		$data['nasabah'] = $this->nasabah_prospek_model->dataperuser()->result();
        
		$data['tglnow'] = date('Y-m-d H:i:s');

		$kode = 'SU-' . date('mds');
		$kode_terakhir = $this->survey_model->getMax('survey', 'id_survey', $kode);
		$kode_tambah = substr($kode_terakhir, -2, 2);
		$kode_tambah++;
		$number = str_pad($kode_tambah, 2, '0', STR_PAD_LEFT);
		$data['kode'] = $kode . $number;

		$this->load->view('templates/header', $data);
		$this->load->view('survey/form_tambah');
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		$data['title'] = 'Survey';

		$data['provinsi'] = $this->wilayah_model->getDataProv();
        
		$data['kategori'] = $this->kategori_model->data()->result();
        $data['jmlkategori'] = $this->kategori_model->data()->num_rows();

		$data['sistempinjam'] = $this->sistem_pinjam_model->data()->result();
        $data['jmlsistempinjam'] = $this->sistem_pinjam_model->data()->num_rows();

		$data['agunan'] = $this->agunan_model->data()->result();
        $data['jmlagunan'] = $this->agunan_model->data()->num_rows();
        $data['nasabah'] = $this->nasabah_prospek_model->data()->result();
		//menampilkan data berdasarkan id
		$data['data'] = $this->survey_model->detailJoin($id)->result();


		$this->load->view('templates/header', $data);
		$this->load->view('survey/form_ubah');
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$data['title'] = 'Survey';
    
		//menampilkan data berdasarkan id
		$data['data'] = $this->survey_model->detailJoin($id)->result();


		$this->load->view('templates/header', $data);
		$this->load->view('survey/detail');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{

        $config['upload_path']   = './assets/upload/survey/';
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
        
		$kode = 			$this->input->post('ids');
		$kpk =				$this->session->userdata('login_session')['kantor_id'];
		$tgl = 				$this->input->post('tgl');
		$kategori =			$this->input->post('kategori');
		$nama_nasabah = 	$this->input->post('nasabah_id');
		$sistem_pinjam = 	$this->input->post('sistem_pinjam');
		$jangka =		 	$this->input->post('jangka');
		$tujuan = 			$this->input->post('tujuan');
		$agunan = 			$this->input->post('agunan');
		$usaha = 			$this->input->post('usaha');
		$plafon = 			$this->input->post('plafon');
		$lokasi = 			$this->input->post('lokasi');
		$lat = 			    $this->input->post('lat');
		$long = 			$this->input->post('long');
		$usrinput = 		$this->session->userdata('login_session')['id_user'];
        
        if ($namaFile1 == '') {
            $ganti1 = 'noimage.png';
        }else{
          if (! $this->upload->do_upload('photo1')) {
            $error = $this->upload->display_errors();
            redirect('survey/tambah');
          }
          else{
  
            $data = array('photo1' => $this->upload->data());
            $config['image_library']='gd2';
            $config['source_image']='./assets/upload/survey/'.$data['photo1']['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '85%';
            $config['width']= 1000;
            $config['height']= 1000;
            $config['new_image']= './assets/upload/survey/'.$data['photo1']['file_name'];
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
            redirect('survey/tambah');
          }
          else{
  
            $data = array('photo2' => $this->upload->data());
            $config['image_library']='gd2';
            $config['source_image']='./assets/upload/survey/'.$data['photo2']['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '85%';
            $config['width']= 1000;
            $config['height']= 1000;
            $config['new_image']= './assets/upload/survey/'.$data['photo2']['file_name'];
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
            redirect('survey/tambah');
          }
          else{
  
            $data = array('photo3' => $this->upload->data());
            $config['image_library']='gd2';
            $config['source_image']='./assets/upload/survey/'.$data['photo3']['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '85%';
            $config['width']= 1000;
            $config['height']= 1000;
            $config['new_image']= './assets/upload/survey/'.$data['photo3']['file_name'];
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
            redirect('survey/tambah');
          }
          else{
  
            $data = array('photo4' => $this->upload->data());
            $config['image_library']='gd2';
            $config['source_image']='./assets/upload/survey/'.$data['photo4']['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '85%';
            $config['width']= 1000;
            $config['height']= 1000;
            $config['new_image']= './assets/upload/survey/'.$data['photo4']['file_name'];
            $this->load->library('image_lib4', $config);
            $this->image_lib4->resize();
            $nama_file= $data['photo4']['file_name'];
            $ganti4 = str_replace(" ", "_", $nama_file);
  
  
          }

      	}
		$data=array(
			'id_survey'=> $kode,
			'kpk'=> $kpk,
			'tanggal_survey'=> $tgl,
			'kategori_id' => $kategori,
			'nasabah_id'=> $nama_nasabah,
			'sistem_pinjam' => $sistem_pinjam,
			'jangka' => $jangka,
			'tujuan' => $tujuan,
			'agunan' => $agunan,
			'usaha' => $usaha,
			'plafon' => $plafon,
			'lokasi' => $lokasi,
			'lati' => $lat,
			'longi' => $long,
			'user_id' => $usrinput,
            'foto_p1' => $ganti1,
            'foto_p2' => $ganti2,
			'foto_p3' => $ganti3,
            'foto_p4' => $ganti4
		);

		$this->survey_model->tambah_data($data, 'survey');
    	redirect('survey');
	}

	public function proses_ubah()
	{
        $config['upload_path']   = './assets/upload/survey/';
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
        
		$kode = 			$this->input->post('ids');
		$kpk = 				$this->input->post('kpk');
		$tgl = 				$this->input->post('tgl');
		$kategori =			$this->input->post('kategori');
		$nama_nasabah = 	$this->input->post('nasabah_id');
		$sistem_pinjam = 	$this->input->post('sistem_pinjam');
		$jangka =		 	$this->input->post('jangka');
		$tujuan = 			$this->input->post('tujuan');
		$agunan = 			$this->input->post('agunan');
		$usaha = 			$this->input->post('usaha');
		$plafon = 			$this->input->post('plafon');
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
            redirect('survey/tambah');
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
            redirect('survey/tambah');
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
            redirect('survey/tambah');
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
            redirect('survey/tambah');
          }
          else{
  
            $data = array('photo4' => $this->upload->data());
            $nama_file= $data['photo4']['file_name'];
            $ganti4 = str_replace(" ", "_", $nama_file);
          }
      	}
		
		$data=array(
			'id_survey'=> $kode,
			'kpk'=> $kpk,
			'tanggal_survey'=> $tgl,
			'kategori_id' => $kategori,
			'nasabah_id'=> $nama_nasabah,
			'alamat'=> $alamat,
			'sistem_pinjam' => $sistem_pinjam,
			'jangka' => $jangka,
			'tujuan' => $tujuan,
			'agunan' => $agunan,
			'usaha' => $usaha,
			'plafon' => $plafon,
			'lokasi' => $lokasi,
			'user_id' => $userid,
            'foto_p1' => $ganti1,
            'foto_p2' => $ganti2,
			'foto_p3' => $ganti3,
            'foto_p4' => $ganti4
		);

		$where = array(
			'id_survey'=>$kode
		);

		$this->survey_model->ubah_data($where, $data, 'survey');
    	redirect('survey');
	}
	
}
