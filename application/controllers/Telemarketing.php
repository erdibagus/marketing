<?php date_default_timezone_set('Asia/Jakarta'); ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Telemarketing extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('kategori_model');
	$this->load->model('sumber_model');
	$this->load->model('telemarketing_model');
	$this->load->model('wilayah_model');
	$this->load->model('user_model');
	$this->load->model('kantor_model');
	$this->load->model('nasabah_prospek_model');
  }
 
    public function ajax_list()
    {
        $list = $this->telemarketing_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->tanggal_telemarketing.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_sumber.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->usaha.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->no_tlp.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->hasil.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="telemarketing/ubah/'.$p->id_telemarketing.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_telemarketing."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->telemarketing_model->count_all(),
                        "recordsFiltered" => $this->telemarketing_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_manajer()
    {
        $list = $this->telemarketing_model->get_datatables_manajer();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->tanggal_telemarketing.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_sumber.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->usaha.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->no_tlp.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->hasil.'';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->telemarketing_model->count_all_manajer(),
                        "recordsFiltered" => $this->telemarketing_model->count_filtered_manajer(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_user()
    {
        $list = $this->telemarketing_model->get_datatables_user();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->tanggal_telemarketing.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_sumber.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->usaha.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->no_tlp.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->hasil.'';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->telemarketing_model->count_all_user(),
                        "recordsFiltered" => $this->telemarketing_model->count_filtered_user(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
	
	public function index()
	{
		$data['title'] = 'telemarketing';

		$this->load->view('templates/header', $data);
		$this->load->view('telemarketing/index');
		$this->load->view('templates/footer');
	}

	public function laporan()
	{
		$data['title'] = 'Laporan Teleprospek';
        $data['user'] = $this->user_model->data()->result();
		$data['usermanajer'] = $this->user_model->datamanajer()->result();
		$data['kantor'] = $this->kantor_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('telemarketing/laporan');
		$this->load->view('templates/footer');
	}

	public function gettelemarketing()
	{
    	$data = $this->telemarketing_model->dataJoin()->result();
    	echo json_encode($data);
	}

	public function filtertgluserkantor($tglawal, $tglakhir, $user, $kantor)
    {
        $list = $this->telemarketing_model->get_datatablestgluserkantor($tglawal, $tglakhir, $user, $kantor);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->tanggal_telemarketing.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_sumber.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->usaha.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->no_tlp.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="telemarketing/ubah/'.$p->id_telemarketing.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_telemarketing."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->telemarketing_model->count_alltgluserkantor($tglawal, $tglakhir, $user, $kantor),
                        "recordsFiltered" => $this->telemarketing_model->count_filteredtgluserkantor($tglawal, $tglakhir, $user, $kantor),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function filtertgluser($tglawal, $tglakhir, $user)
    {
        $list = $this->telemarketing_model->get_datatablestgluser($tglawal, $tglakhir, $user);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->tanggal_telemarketing.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_sumber.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->usaha.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->no_tlp.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="telemarketing/ubah/'.$p->id_telemarketing.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_telemarketing."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->telemarketing_model->count_alltgluser($tglawal, $tglakhir, $user),
                        "recordsFiltered" => $this->telemarketing_model->count_filteredtgluser($tglawal, $tglakhir, $user),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function filtertglkantor($tglawal, $tglakhir, $kantor)
    {
        $list = $this->telemarketing_model->get_datatablestglkantor($tglawal, $tglakhir, $kantor);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->tanggal_telemarketing.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_sumber.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->usaha.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->no_tlp.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="telemarketing/ubah/'.$p->id_telemarketing.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_telemarketing."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->telemarketing_model->count_alltglkantor($tglawal, $tglakhir, $kantor),
                        "recordsFiltered" => $this->telemarketing_model->count_filteredtglkantor($tglawal, $tglakhir, $kantor),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function filtertgl($tglawal, $tglakhir)
    {
        $list = $this->telemarketing_model->get_datatablestgl($tglawal, $tglakhir);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->tanggal_telemarketing.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_sumber.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->usaha.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->no_tlp.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="telemarketing/ubah/'.$p->id_telemarketing.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_telemarketing."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->telemarketing_model->count_alltgl($tglawal, $tglakhir),
                        "recordsFiltered" => $this->telemarketing_model->count_filteredtgl($tglawal, $tglakhir),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function filtertglmanajer($tglawal, $tglakhir)
    {
        $list = $this->telemarketing_model->get_datatablestglmanajer($tglawal, $tglakhir);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->tanggal_telemarketing.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_kantor.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_sumber.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->usaha.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_telemarketing."'".')">'.$p->no_tlp.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="telemarketing/ubah/'.$p->id_telemarketing.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_telemarketing."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->telemarketing_model->count_alltglmanajer($tglawal, $tglakhir),
                        "recordsFiltered" => $this->telemarketing_model->count_filteredtglmanajer($tglawal, $tglakhir),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function proses_hapus($id)
	{
		$where = array('id_telemarketing' => $id );
		
		$this->telemarketing_model->hapus_data($where, 'telemarketing');
		
		redirect('telemarketing');
	}

	public function tambah()
	{
        $data['title'] = 'telemarketing';

		$data['kategori'] = $this->kategori_model->data()->result();  
        $data['sumber'] = $this->sumber_model->data()->result();
        $data['nasabah'] = $this->nasabah_prospek_model->dataperuser()->result();

		$kode = 'TM-' . date('mds');
		$kode_terakhir = $this->telemarketing_model->getMax('telemarketing', 'id_telemarketing', $kode);
		$kode_tambah = substr($kode_terakhir, -2, 2);
		$kode_tambah++;
		$number = str_pad($kode_tambah, 2, '0', STR_PAD_LEFT);
		$data['kode'] = $kode . $number;
        
		$data['tglnow'] = date('Y-m-d H:i:s');

		$this->load->view('templates/header', $data);
		$this->load->view('telemarketing/form_tambah');
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		$data['title'] = 'telemarketing';
        
		$data['kategori'] = $this->kategori_model->data()->result();      
        $data['sumber'] = $this->sumber_model->data()->result();
        $data['nasabah'] = $this->nasabah_prospek_model->data()->result();
		//menampilkan data berdasarkan id
		$data['data'] = $this->telemarketing_model->detailJoin($id)->result();


		$this->load->view('templates/header', $data);
		$this->load->view('telemarketing/form_ubah');
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$data['title'] = 'telemarketing';
    
		//menampilkan data berdasarkan id
		$data['data'] = $this->telemarketing_model->detailJoin($id)->result();


		$this->load->view('templates/header', $data);
		$this->load->view('telemarketing/detail');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{     
		$kode = 			$this->input->post('idtm');
		$kpk =				$this->session->userdata('login_session')['kantor_id'];
		$tgl = 				$this->input->post('tgl');
		$kategori =			$this->input->post('kategori');
		$sumber =			$this->input->post('sumber');
		$nama_nasabah = 	$this->input->post('nasabah_id');
		$usaha = 			$this->input->post('usaha');
		$hasil = 			$this->input->post('hasil');
		$usrinput = 		$this->session->userdata('login_session')['id_user'];
        
        
		$data=array(
			'id_telemarketing'=> $kode,
			'kpk'=> $kpk,
			'tanggal_telemarketing'=> $tgl,
			'kategori_id' => $kategori,
			'nasabah_id'=> $nama_nasabah,
			'sumber_id' => $sumber,
			'usaha' => $usaha,
			'hasil' => $hasil,
			'user_id' => $usrinput,
		);

		$this->telemarketing_model->tambah_data($data, 'telemarketing');

        $this->load->library('upload', $config);

        $nama_nasabah 	= $this->input->post('nasabah_id');
		$no_tlp = 			$this->input->post('no_tlp');

		if($no_tlp == ''){
			$no_tlp_update = redirect('telemarketing');
		}else{
			$no_tlp_update = $this->input->post('no_tlp');
		}

		$data=array(
        'id_nasabah_prospek'=> $nama_nasabah,
		'no_tlp' => $no_tlp_update
		);

		$where = array(

			'id_nasabah_prospek'=>$nama_nasabah
		);
        $this->nasabah_prospek_model->ubah_data($where, $data, 'nasabah_prospek');
    	redirect('telemarketing');
	}

	public function proses_ubah()
	{       
		$kode = 			$this->input->post('idtm');
		$tgl = 				$this->input->post('tgl');
		$kategori =			$this->input->post('kategori');
		$sumber =			$this->input->post('sumber');
		$nama_nasabah = 	$this->input->post('nasabah_id');
		$alamat = 			$this->input->post('alamat');
		$hasil = 			$this->input->post('hasil');
		$kpk = 				$this->input->post('kpk');
		$userid = 			$this->input->post('user');

		$data=array(
			'id_telemarketing'=> $kode,
			'kpk'=> $kpk,
			'tanggal_telemarketing'=> $tgl,
			'kategori_id' => $kategori,
			'nasabah_id'=> $nama_nasabah,
			'alamat'=> $alamat,
			'sumber_id' => $sumber,
			'hasil' => $hasil,
			'no_tlp' => $no_tlp,
			'kpk' => $kpk,
			'user_id' => $userid,
		);

		$where = array(
			'id_telemarketing'=>$kode
		);

		$this->telemarketing_model->ubah_data($where, $data, 'telemarketing');
    	redirect('telemarketing');
	}
	
}
