<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->helper('cookie');
	$this->load->model('user_model');
	$this->load->model('kantor_model');
	$this->load->model('prospek_model');
	$this->load->model('survey_model');
	$this->load->model('penagihan_model');
	$this->load->model('telemarketing_model');
	$this->load->model('teletagih_model');
  }
	
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['jmlUser'] = $this->user_model->data()->num_rows();
		$data['jmlKantor'] = $this->kantor_model->data()->num_rows();
		$data['dpr5Terakhir'] = $this->prospek_model->transaksiTerakhir()->result();
		$data['dsu5Terakhir'] = $this->survey_model->transaksiTerakhir()->result();
		$data['dpe5Terakhir'] = $this->penagihan_model->transaksiTerakhir()->result();
		$data['dtm5Terakhir'] = $this->telemarketing_model->transaksiTerakhir()->result();
		$data['dtt5Terakhir'] = $this->teletagih_model->transaksiTerakhir()->result();

		$data['yearnow']=date('Y', strtotime('+0 year'));
		$data['previousyear']=date('Y', strtotime('-1 year'));
		$data['twoyearago']=date('Y', strtotime('-2 year'));

		$data['user'] = $this->user_model->data()->result();
		$data['usermanajer'] = $this->user_model->datamanajer()->result();
		$data['kpk'] = $this->kantor_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('home/index');
		$this->load->view('templates/footer');

	}

	public function grafik()
	{
		$data['title'] = 'Grafik';
		$data['jmlUser'] = $this->user_model->data()->num_rows();
		$data['jmlKantor'] = $this->kantor_model->data()->num_rows();
		$data['dpr5Terakhir'] = $this->prospek_model->transaksiTerakhir()->result();
		$data['dsu5Terakhir'] = $this->survey_model->transaksiTerakhir()->result();
		$data['dpe5Terakhir'] = $this->penagihan_model->transaksiTerakhir()->result();
		$data['dtm5Terakhir'] = $this->telemarketing_model->transaksiTerakhir()->result();
		$data['dtt5Terakhir'] = $this->teletagih_model->transaksiTerakhir()->result();

		$data['yearnow']=date('Y', strtotime('+0 year'));
		$data['previousyear']=date('Y', strtotime('-1 year'));
		$data['twoyearago']=date('Y', strtotime('-2 year'));

		$data['user'] = $this->user_model->data()->result();
		$data['kpk'] = $this->kantor_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('home/grafik');
		$this->load->view('templates/footer');

	}

	public function grafikmanajer()
	{
		$data['title'] = 'Grafik';
		$data['jmlUser'] = $this->user_model->data()->num_rows();
		$data['jmlKantor'] = $this->kantor_model->data()->num_rows();
		$data['dpr5Terakhir'] = $this->prospek_model->transaksiTerakhir()->result();
		$data['dsu5Terakhir'] = $this->survey_model->transaksiTerakhir()->result();
		$data['dpe5Terakhir'] = $this->penagihan_model->transaksiTerakhir()->result();
		$data['dtm5Terakhir'] = $this->telemarketing_model->transaksiTerakhir()->result();
		$data['dtt5Terakhir'] = $this->teletagih_model->transaksiTerakhir()->result();

		$data['yearnow']=date('Y', strtotime('+0 year'));
		$data['previousyear']=date('Y', strtotime('-1 year'));
		$data['twoyearago']=date('Y', strtotime('-2 year'));

		$data['usermanajer'] = $this->user_model->datamanajer()->result();
		$data['kpk'] = $this->kantor_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('home/grafik_manajer');
		$this->load->view('templates/footer');

	}

	public function getTotalTransaksi()
	{
		$tahun = $this->input->post('tahunpie');
		$jmlPR = $this->prospek_model->dataJoinLike($tahun)->num_rows();
		$jmlSU = $this->survey_model->dataJoinLike($tahun)->num_rows();
		$jmlPE = $this->penagihan_model->dataJoinLike($tahun)->num_rows();
		$jmlTM = $this->telemarketing_model->dataJoinLike($tahun)->num_rows();
		$jmlTT = $this->teletagih_model->dataJoinLike($tahun)->num_rows();

		$data = array('jmlpr'=>$jmlPR, 'jmlsu'=>$jmlSU, 'jmlpe'=>$jmlPE, 'jmltm'=>$jmlTM, 'jmltt'=>$jmlTT);
		echo json_encode($data);
	}

	public function getTotalTransaksiUser()
	{
		$tahun = $this->input->post('tahunpie');
		$user = $this->input->post('userpie');
		$jmlPR = $this->prospek_model->dataJoinLikeUser($tahun, $user)->num_rows();
		$jmlSU = $this->survey_model->dataJoinLikeUser($tahun, $user)->num_rows();
		$jmlPE = $this->penagihan_model->dataJoinLikeUser($tahun, $user)->num_rows();
		$jmlTM = $this->telemarketing_model->dataJoinLikeUser($tahun, $user)->num_rows();
		$jmlTT = $this->teletagih_model->dataJoinLikeUser($tahun, $user)->num_rows();

		$data = array('jmlpr'=>$jmlPR, 'jmlsu'=>$jmlSU, 'jmlpe'=>$jmlPE, 'jmltm'=>$jmlTM, 'jmltt'=>$jmlTT);
		echo json_encode($data);
	}

	public function getTotalTransaksiKpk()
	{
		$tahun = $this->input->post('tahunpie');
		$kpk = $this->input->post('kpkpie');

		$jmlPR = $this->prospek_model->dataJoinLikeKpk($tahun, $kpk)->num_rows();
		$jmlSU = $this->survey_model->dataJoinLikeKpk($tahun, $kpk)->num_rows();
		$jmlPE = $this->penagihan_model->dataJoinLikeKpk($tahun, $kpk)->num_rows();
		$jmlTM = $this->telemarketing_model->dataJoinLikeKpk($tahun, $kpk)->num_rows();
		$jmlTT = $this->teletagih_model->dataJoinLikeKpk($tahun, $kpk)->num_rows();

		$data = array('jmlpr'=>$jmlPR, 'jmlsu'=>$jmlSU, 'jmlpe'=>$jmlPE, 'jmltm'=>$jmlTM, 'jmltt'=>$jmlTT);
		echo json_encode($data);
	}

	public function getFilterTahunUser()
	{
		$tahun = $this->input->post('tahun');
		$user = $this->input->post('user');

		//Januari
		$januari = 'January';
		$last_januari = date('Y-m-t', strtotime($tahun.'-'.$januari.'-01'));
		$first_januari = date('Y-m-01', strtotime($tahun.'-'.$januari.'-01'));
		$prJanuari = $this->prospek_model->jmlperbulanuser($first_januari, $last_januari, $user)->num_rows();
		$suJanuari = $this->survey_model->jmlperbulanuser($first_januari, $last_januari, $user)->num_rows();
		$peJanuari = $this->penagihan_model->jmlperbulanuser($first_januari, $last_januari, $user)->num_rows();
		$tmJanuari = $this->telemarketing_model->jmlperbulanuser($first_januari, $last_januari, $user)->num_rows();
		$ttJanuari = $this->teletagih_model->jmlperbulanuser($first_januari, $last_januari, $user)->num_rows();

		//Februari
		$februari = 'February';
		$last_februari = date('Y-m-t', strtotime($tahun.'-'.$februari.'-01'));
		$first_februari = date('Y-m-01', strtotime($tahun.'-'.$februari.'-01'));
		$prFebruari = $this->prospek_model->jmlperbulanuser($first_februari, $last_februari, $user)->num_rows();
		$suFebruari = $this->survey_model->jmlperbulanuser($first_februari, $last_februari, $user)->num_rows();
		$peFebruari = $this->penagihan_model->jmlperbulanuser($first_februari, $last_februari, $user)->num_rows();
		$tmFebruari = $this->telemarketing_model->jmlperbulanuser($first_februari, $last_februari, $user)->num_rows();
		$ttFebruari = $this->teletagih_model->jmlperbulanuser($first_februari, $last_februari, $user)->num_rows();

		//Maret
		$maret = 'March';
		$last_maret = date('Y-m-t', strtotime($tahun.'-'.$maret.'-01'));
		$first_maret = date('Y-m-01', strtotime($tahun.'-'.$maret.'-01'));
		$prMaret = $this->prospek_model->jmlperbulanuser($first_maret, $last_maret, $user)->num_rows();
		$suMaret = $this->survey_model->jmlperbulanuser($first_maret, $last_maret, $user)->num_rows();
		$peMaret = $this->penagihan_model->jmlperbulanuser($first_maret, $last_maret, $user)->num_rows();
		$tmMaret = $this->telemarketing_model->jmlperbulanuser($first_maret, $last_maret, $user)->num_rows();
		$ttMaret = $this->teletagih_model->jmlperbulanuser($first_maret, $last_maret, $user)->num_rows();

		//april
		$april = 'April';
		$last_april = date('Y-m-t', strtotime($tahun.'-'.$april.'-01'));
		$first_april = date('Y-m-01', strtotime($tahun.'-'.$april.'-01'));
		$prApril = $this->prospek_model->jmlperbulanuser($first_april, $last_april, $user)->num_rows();
		$suApril = $this->survey_model->jmlperbulanuser($first_april, $last_april, $user)->num_rows();
		$peApril = $this->penagihan_model->jmlperbulanuser($first_april, $last_april, $user)->num_rows();
		$tmApril = $this->telemarketing_model->jmlperbulanuser($first_april, $last_april, $user)->num_rows();
		$ttApril = $this->teletagih_model->jmlperbulanuser($first_april, $last_april, $user)->num_rows();

		//mei
		$mei = 'May';
		$last_mei = date('Y-m-t', strtotime($tahun.'-'.$mei.'-01'));
		$first_mei = date('Y-m-01', strtotime($tahun.'-'.$mei.'-01'));
		$prMei = $this->prospek_model->jmlperbulanuser($first_mei, $last_mei, $user)->num_rows();
		$suMei = $this->survey_model->jmlperbulanuser($first_mei, $last_mei, $user)->num_rows();
		$peMei = $this->penagihan_model->jmlperbulanuser($first_mei, $last_mei, $user)->num_rows();
		$tmMei = $this->telemarketing_model->jmlperbulanuser($first_mei, $last_mei, $user)->num_rows();
		$ttMei = $this->teletagih_model->jmlperbulanuser($first_mei, $last_mei, $user)->num_rows();

		//juni
		$juni = 'June';
		$last_juni = date('Y-m-t', strtotime($tahun.'-'.$juni.'-01'));
		$first_juni = date('Y-m-01', strtotime($tahun.'-'.$juni.'-01'));
		$prJuni = $this->prospek_model->jmlperbulanuser($first_juni, $last_juni, $user)->num_rows();
		$suJuni = $this->survey_model->jmlperbulanuser($first_juni, $last_juni, $user)->num_rows();
		$peJuni = $this->penagihan_model->jmlperbulanuser($first_juni, $last_juni, $user)->num_rows();
		$tmJuni = $this->telemarketing_model->jmlperbulanuser($first_juni, $last_juni, $user)->num_rows();
		$ttJuni = $this->teletagih_model->jmlperbulanuser($first_juni, $last_juni, $user)->num_rows();

		//juli
		$juli = 'July';
		$last_juli = date('Y-m-t', strtotime($tahun.'-'.$juli.'-01'));
		$first_juli = date('Y-m-01', strtotime($tahun.'-'.$juli.'-01'));
		$prJuli = $this->prospek_model->jmlperbulanuser($first_juli, $last_juli, $user)->num_rows();
		$suJuli = $this->survey_model->jmlperbulanuser($first_juli, $last_juli, $user)->num_rows();
		$peJuli = $this->penagihan_model->jmlperbulanuser($first_juli, $last_juli, $user)->num_rows();
		$tmJuli = $this->telemarketing_model->jmlperbulanuser($first_juli, $last_juli, $user)->num_rows();
		$ttJuli = $this->teletagih_model->jmlperbulanuser($first_juli, $last_juli, $user)->num_rows();

		//agustus
		$agustus = 'August';
		$last_agustus = date('Y-m-t', strtotime($tahun.'-'.$agustus.'-01'));
		$first_agustus = date('Y-m-01', strtotime($tahun.'-'.$agustus.'-01'));
		$prAgustus = $this->prospek_model->jmlperbulanuser($first_agustus, $last_agustus, $user)->num_rows();
		$suAgustus = $this->survey_model->jmlperbulanuser($first_agustus, $last_agustus, $user)->num_rows();
		$peAgustus = $this->penagihan_model->jmlperbulanuser($first_agustus, $last_agustus, $user)->num_rows();
		$tmAgustus = $this->telemarketing_model->jmlperbulanuser($first_agustus, $last_agustus, $user)->num_rows();
		$ttAgustus = $this->teletagih_model->jmlperbulanuser($first_agustus, $last_agustus, $user)->num_rows();

		//september
		$september = 'September';
		$last_september = date('Y-m-t', strtotime($tahun.'-'.$september.'-01'));
		$first_september = date('Y-m-01', strtotime($tahun.'-'.$september.'-01'));
		$prSeptember = $this->prospek_model->jmlperbulanuser($first_september, $last_september, $user)->num_rows();
		$suSeptember = $this->survey_model->jmlperbulanuser($first_september, $last_september, $user)->num_rows();
		$peSeptember = $this->penagihan_model->jmlperbulanuser($first_september, $last_september, $user)->num_rows();
		$tmSeptember = $this->telemarketing_model->jmlperbulanuser($first_september, $last_september, $user)->num_rows();
		$ttSeptember = $this->teletagih_model->jmlperbulanuser($first_september, $last_september, $user)->num_rows();
		
		//oktober
		$oktober = 'October';
		$last_oktober = date('Y-m-t', strtotime($tahun.'-'.$oktober.'-01'));
		$first_oktober = date('Y-m-01', strtotime($tahun.'-'.$oktober.'-01'));
		$prOktober = $this->prospek_model->jmlperbulanuser($first_oktober, $last_oktober, $user)->num_rows();
		$suOktober = $this->survey_model->jmlperbulanuser($first_oktober, $last_oktober, $user)->num_rows();
		$peOktober = $this->penagihan_model->jmlperbulanuser($first_oktober, $last_oktober, $user)->num_rows();
		$tmOktober = $this->telemarketing_model->jmlperbulanuser($first_oktober, $last_oktober, $user)->num_rows();
		$ttOktober = $this->teletagih_model->jmlperbulanuser($first_oktober, $last_oktober, $user)->num_rows();

		//november
		$november = 'November';
		$last_november = date('Y-m-t', strtotime($tahun.'-'.$november.'-01'));
		$first_november = date('Y-m-01', strtotime($tahun.'-'.$november.'-01'));
		$prNovember = $this->prospek_model->jmlperbulanuser($first_november, $last_november, $user)->num_rows();
		$suNovember = $this->survey_model->jmlperbulanuser($first_november, $last_november, $user)->num_rows();
		$peNovember = $this->penagihan_model->jmlperbulanuser($first_november, $last_november, $user)->num_rows();
		$tmNovember = $this->telemarketing_model->jmlperbulanuser($first_november, $last_november, $user)->num_rows();
		$ttNovember = $this->teletagih_model->jmlperbulanuser($first_november, $last_november, $user)->num_rows();

		//desember
		$desember = 'December';
		$last_desember = date('Y-m-t', strtotime($tahun.'-'.$desember.'-01'));
		$first_desember = date('Y-m-01', strtotime($tahun.'-'.$desember.'-01'));
		$prDesember = $this->prospek_model->jmlperbulanuser($first_desember, $last_desember, $user)->num_rows();
		$suDesember = $this->survey_model->jmlperbulanuser($first_desember, $last_desember, $user)->num_rows();
		$peDesember = $this->penagihan_model->jmlperbulanuser($first_desember, $last_desember, $user)->num_rows();
		$tmDesember = $this->telemarketing_model->jmlperbulanuser($first_desember, $last_desember, $user)->num_rows();
		$ttDesember = $this->teletagih_model->jmlperbulanuser($first_desember, $last_desember, $user)->num_rows();


		$data = array(
			'prJanuari' => $prJanuari,
			'prFebruari' => $prFebruari,
			'prMaret' => $prMaret,
			'prApril' => $prApril,
			'prMei' => $prMei,
			'prJuni' => $prJuni,
			'prJuli' => $prJuli,
			'prAgustus' => $prAgustus,
			'prSeptember' => $prSeptember,
			'prOktober' => $prOktober,
			'prNovember' => $prNovember,
			'prDesember' => $prDesember,
			'suJanuari' => $suJanuari,
			'suFebruari' => $suFebruari,
			'suMaret' => $suMaret,
			'suApril' => $suApril,
			'suMei' => $suMei,
			'suJuni' => $suJuni,
			'suJuli' => $suJuli,
			'suAgustus' => $suAgustus,
			'suSeptember' => $suSeptember,
			'suOktober' => $suOktober,
			'suNovember' => $suNovember,
			'suDesember' => $suDesember,
			'peJanuari' => $peJanuari,
			'peFebruari' => $peFebruari,
			'peMaret' => $peMaret,
			'peApril' => $peApril,
			'peMei' => $peMei,
			'peJuni' => $peJuni,
			'peJuli' => $peJuli,
			'peAgustus' => $peAgustus,
			'peSeptember' => $peSeptember,
			'peOktober' => $peOktober,
			'peNovember' => $peNovember,
			'peDesember' => $peDesember,
			'tmJanuari' => $tmJanuari,
			'tmFebruari' => $tmFebruari,
			'tmMaret' => $tmMaret,
			'tmApril' => $tmApril,
			'tmMei' => $tmMei,
			'tmJuni' => $tmJuni,
			'tmJuli' => $tmJuli,
			'tmAgustus' => $tmAgustus,
			'tmSeptember' => $tmSeptember,
			'tmOktober' => $tmOktober,
			'tmNovember' => $tmNovember,
			'tmDesember' => $tmDesember,
			'ttJanuari' => $ttJanuari,
			'ttFebruari' => $ttFebruari,
			'ttMaret' => $ttMaret,
			'ttApril' => $ttApril,
			'ttMei' => $ttMei,
			'ttJuni' => $ttJuni,
			'ttJuli' => $ttJuli,
			'ttAgustus' => $ttAgustus,
			'ttSeptember' => $ttSeptember,
			'ttOktober' => $ttOktober,
			'ttNovember' => $ttNovember,
			'ttDesember' => $ttDesember,
		);
    	echo json_encode($data);
	}

	public function getFilterTahunKpk()
	{
		$tahun = $this->input->post('tahun');
		$kpk = $this->input->post('kpk');

		//Januari
		$januari = 'January';
		$last_januari = date('Y-m-t', strtotime($tahun.'-'.$januari.'-01'));
		$first_januari = date('Y-m-01', strtotime($tahun.'-'.$januari.'-01'));
		$prJanuari = $this->prospek_model->jmlperbulankpk($first_januari, $last_januari, $kpk)->num_rows();
		$suJanuari = $this->survey_model->jmlperbulankpk($first_januari, $last_januari, $kpk)->num_rows();
		$peJanuari = $this->penagihan_model->jmlperbulankpk($first_januari, $last_januari, $kpk)->num_rows();
		$tmJanuari = $this->telemarketing_model->jmlperbulankpk($first_januari, $last_januari, $kpk)->num_rows();
		$ttJanuari = $this->teletagih_model->jmlperbulankpk($first_januari, $last_januari, $kpk)->num_rows();

		//Februari
		$februari = 'February';
		$last_februari = date('Y-m-t', strtotime($tahun.'-'.$februari.'-01'));
		$first_februari = date('Y-m-01', strtotime($tahun.'-'.$februari.'-01'));
		$prFebruari = $this->prospek_model->jmlperbulankpk($first_februari, $last_februari, $kpk)->num_rows();
		$suFebruari = $this->survey_model->jmlperbulankpk($first_februari, $last_februari, $kpk)->num_rows();
		$peFebruari = $this->penagihan_model->jmlperbulankpk($first_februari, $last_februari, $kpk)->num_rows();
		$tmFebruari = $this->telemarketing_model->jmlperbulankpk($first_februari, $last_februari, $kpk)->num_rows();
		$ttFebruari = $this->teletagih_model->jmlperbulankpk($first_februari, $last_februari, $kpk)->num_rows();

		//Maret
		$maret = 'March';
		$last_maret = date('Y-m-t', strtotime($tahun.'-'.$maret.'-01'));
		$first_maret = date('Y-m-01', strtotime($tahun.'-'.$maret.'-01'));
		$prMaret = $this->prospek_model->jmlperbulankpk($first_maret, $last_maret, $kpk)->num_rows();
		$suMaret = $this->survey_model->jmlperbulankpk($first_maret, $last_maret, $kpk)->num_rows();
		$peMaret = $this->penagihan_model->jmlperbulankpk($first_maret, $last_maret, $kpk)->num_rows();
		$tmMaret = $this->telemarketing_model->jmlperbulankpk($first_maret, $last_maret, $kpk)->num_rows();
		$ttMaret = $this->teletagih_model->jmlperbulankpk($first_maret, $last_maret, $kpk)->num_rows();

		//april
		$april = 'April';
		$last_april = date('Y-m-t', strtotime($tahun.'-'.$april.'-01'));
		$first_april = date('Y-m-01', strtotime($tahun.'-'.$april.'-01'));
		$prApril = $this->prospek_model->jmlperbulankpk($first_april, $last_april, $kpk)->num_rows();
		$suApril = $this->survey_model->jmlperbulankpk($first_april, $last_april, $kpk)->num_rows();
		$peApril = $this->penagihan_model->jmlperbulankpk($first_april, $last_april, $kpk)->num_rows();
		$tmApril = $this->telemarketing_model->jmlperbulankpk($first_april, $last_april, $kpk)->num_rows();
		$ttApril = $this->teletagih_model->jmlperbulankpk($first_april, $last_april, $kpk)->num_rows();

		//mei
		$mei = 'May';
		$last_mei = date('Y-m-t', strtotime($tahun.'-'.$mei.'-01'));
		$first_mei = date('Y-m-01', strtotime($tahun.'-'.$mei.'-01'));
		$prMei = $this->prospek_model->jmlperbulankpk($first_mei, $last_mei, $kpk)->num_rows();
		$suMei = $this->survey_model->jmlperbulankpk($first_mei, $last_mei, $kpk)->num_rows();
		$peMei = $this->penagihan_model->jmlperbulankpk($first_mei, $last_mei, $kpk)->num_rows();
		$tmMei = $this->telemarketing_model->jmlperbulankpk($first_mei, $last_mei, $kpk)->num_rows();
		$ttMei = $this->teletagih_model->jmlperbulankpk($first_mei, $last_mei, $kpk)->num_rows();

		//juni
		$juni = 'June';
		$last_juni = date('Y-m-t', strtotime($tahun.'-'.$juni.'-01'));
		$first_juni = date('Y-m-01', strtotime($tahun.'-'.$juni.'-01'));
		$prJuni = $this->prospek_model->jmlperbulankpk($first_juni, $last_juni, $kpk)->num_rows();
		$suJuni = $this->survey_model->jmlperbulankpk($first_juni, $last_juni, $kpk)->num_rows();
		$peJuni = $this->penagihan_model->jmlperbulankpk($first_juni, $last_juni, $kpk)->num_rows();
		$tmJuni = $this->telemarketing_model->jmlperbulankpk($first_juni, $last_juni, $kpk)->num_rows();
		$ttJuni = $this->teletagih_model->jmlperbulankpk($first_juni, $last_juni, $kpk)->num_rows();

		//juli
		$juli = 'July';
		$last_juli = date('Y-m-t', strtotime($tahun.'-'.$juli.'-01'));
		$first_juli = date('Y-m-01', strtotime($tahun.'-'.$juli.'-01'));
		$prJuli = $this->prospek_model->jmlperbulankpk($first_juli, $last_juli, $kpk)->num_rows();
		$suJuli = $this->survey_model->jmlperbulankpk($first_juli, $last_juli, $kpk)->num_rows();
		$peJuli = $this->penagihan_model->jmlperbulankpk($first_juli, $last_juli, $kpk)->num_rows();
		$tmJuli = $this->telemarketing_model->jmlperbulankpk($first_juli, $last_juli, $kpk)->num_rows();
		$ttJuli = $this->teletagih_model->jmlperbulankpk($first_juli, $last_juli, $kpk)->num_rows();

		//agustus
		$agustus = 'August';
		$last_agustus = date('Y-m-t', strtotime($tahun.'-'.$agustus.'-01'));
		$first_agustus = date('Y-m-01', strtotime($tahun.'-'.$agustus.'-01'));
		$prAgustus = $this->prospek_model->jmlperbulankpk($first_agustus, $last_agustus, $kpk)->num_rows();
		$suAgustus = $this->survey_model->jmlperbulankpk($first_agustus, $last_agustus, $kpk)->num_rows();
		$peAgustus = $this->penagihan_model->jmlperbulankpk($first_agustus, $last_agustus, $kpk)->num_rows();
		$tmAgustus = $this->telemarketing_model->jmlperbulankpk($first_agustus, $last_agustus, $kpk)->num_rows();
		$ttAgustus = $this->teletagih_model->jmlperbulankpk($first_agustus, $last_agustus, $kpk)->num_rows();

		//september
		$september = 'September';
		$last_september = date('Y-m-t', strtotime($tahun.'-'.$september.'-01'));
		$first_september = date('Y-m-01', strtotime($tahun.'-'.$september.'-01'));
		$prSeptember = $this->prospek_model->jmlperbulankpk($first_september, $last_september, $kpk)->num_rows();
		$suSeptember = $this->survey_model->jmlperbulankpk($first_september, $last_september, $kpk)->num_rows();
		$peSeptember = $this->penagihan_model->jmlperbulankpk($first_september, $last_september, $kpk)->num_rows();
		$tmSeptember = $this->telemarketing_model->jmlperbulankpk($first_september, $last_september, $kpk)->num_rows();
		$ttSeptember = $this->teletagih_model->jmlperbulankpk($first_september, $last_september, $kpk)->num_rows();
		
		//oktober
		$oktober = 'October';
		$last_oktober = date('Y-m-t', strtotime($tahun.'-'.$oktober.'-01'));
		$first_oktober = date('Y-m-01', strtotime($tahun.'-'.$oktober.'-01'));
		$prOktober = $this->prospek_model->jmlperbulankpk($first_oktober, $last_oktober, $kpk)->num_rows();
		$suOktober = $this->survey_model->jmlperbulankpk($first_oktober, $last_oktober, $kpk)->num_rows();
		$peOktober = $this->penagihan_model->jmlperbulankpk($first_oktober, $last_oktober, $kpk)->num_rows();
		$tmOktober = $this->telemarketing_model->jmlperbulankpk($first_oktober, $last_oktober, $kpk)->num_rows();
		$ttOktober = $this->teletagih_model->jmlperbulankpk($first_oktober, $last_oktober, $kpk)->num_rows();

		//november
		$november = 'November';
		$last_november = date('Y-m-t', strtotime($tahun.'-'.$november.'-01'));
		$first_november = date('Y-m-01', strtotime($tahun.'-'.$november.'-01'));
		$prNovember = $this->prospek_model->jmlperbulankpk($first_november, $last_november, $kpk)->num_rows();
		$suNovember = $this->survey_model->jmlperbulankpk($first_november, $last_november, $kpk)->num_rows();
		$peNovember = $this->penagihan_model->jmlperbulankpk($first_november, $last_november, $kpk)->num_rows();
		$tmNovember = $this->telemarketing_model->jmlperbulankpk($first_november, $last_november, $kpk)->num_rows();
		$ttNovember = $this->teletagih_model->jmlperbulankpk($first_november, $last_november, $kpk)->num_rows();

		//desember
		$desember = 'December';
		$last_desember = date('Y-m-t', strtotime($tahun.'-'.$desember.'-01'));
		$first_desember = date('Y-m-01', strtotime($tahun.'-'.$desember.'-01'));
		$prDesember = $this->prospek_model->jmlperbulankpk($first_desember, $last_desember, $kpk)->num_rows();
		$suDesember = $this->survey_model->jmlperbulankpk($first_desember, $last_desember, $kpk)->num_rows();
		$peDesember = $this->penagihan_model->jmlperbulankpk($first_desember, $last_desember, $kpk)->num_rows();
		$tmDesember = $this->telemarketing_model->jmlperbulankpk($first_desember, $last_desember, $kpk)->num_rows();
		$ttDesember = $this->teletagih_model->jmlperbulankpk($first_desember, $last_desember, $kpk)->num_rows();


		$data = array(
			'prJanuari' => $prJanuari,
			'prFebruari' => $prFebruari,
			'prMaret' => $prMaret,
			'prApril' => $prApril,
			'prMei' => $prMei,
			'prJuni' => $prJuni,
			'prJuli' => $prJuli,
			'prAgustus' => $prAgustus,
			'prSeptember' => $prSeptember,
			'prOktober' => $prOktober,
			'prNovember' => $prNovember,
			'prDesember' => $prDesember,
			'suJanuari' => $suJanuari,
			'suFebruari' => $suFebruari,
			'suMaret' => $suMaret,
			'suApril' => $suApril,
			'suMei' => $suMei,
			'suJuni' => $suJuni,
			'suJuli' => $suJuli,
			'suAgustus' => $suAgustus,
			'suSeptember' => $suSeptember,
			'suOktober' => $suOktober,
			'suNovember' => $suNovember,
			'suDesember' => $suDesember,
			'peJanuari' => $peJanuari,
			'peFebruari' => $peFebruari,
			'peMaret' => $peMaret,
			'peApril' => $peApril,
			'peMei' => $peMei,
			'peJuni' => $peJuni,
			'peJuli' => $peJuli,
			'peAgustus' => $peAgustus,
			'peSeptember' => $peSeptember,
			'peOktober' => $peOktober,
			'peNovember' => $peNovember,
			'peDesember' => $peDesember,
			'tmJanuari' => $tmJanuari,
			'tmFebruari' => $tmFebruari,
			'tmMaret' => $tmMaret,
			'tmApril' => $tmApril,
			'tmMei' => $tmMei,
			'tmJuni' => $tmJuni,
			'tmJuli' => $tmJuli,
			'tmAgustus' => $tmAgustus,
			'tmSeptember' => $tmSeptember,
			'tmOktober' => $tmOktober,
			'tmNovember' => $tmNovember,
			'tmDesember' => $tmDesember,
			'ttJanuari' => $ttJanuari,
			'ttFebruari' => $ttFebruari,
			'ttMaret' => $ttMaret,
			'ttApril' => $ttApril,
			'ttMei' => $ttMei,
			'ttJuni' => $ttJuni,
			'ttJuli' => $ttJuli,
			'ttAgustus' => $ttAgustus,
			'ttSeptember' => $ttSeptember,
			'ttOktober' => $ttOktober,
			'ttNovember' => $ttNovember,
			'ttDesember' => $ttDesember,
		);
    	echo json_encode($data);
	}

	public function getFilterTahun()
	{
		$tahun = $this->input->post('tahun');

		//Januari
		$januari = 'January';
		$last_januari = date('Y-m-t', strtotime($tahun.'-'.$januari.'-01'));
		$first_januari = date('Y-m-01', strtotime($tahun.'-'.$januari.'-01'));
		$prJanuari = $this->prospek_model->jmlperbulan($first_januari, $last_januari)->num_rows();
		$suJanuari = $this->survey_model->jmlperbulan($first_januari, $last_januari)->num_rows();
		$peJanuari = $this->penagihan_model->jmlperbulan($first_januari, $last_januari)->num_rows();
		$tmJanuari = $this->telemarketing_model->jmlperbulan($first_januari, $last_januari)->num_rows();
		$ttJanuari = $this->teletagih_model->jmlperbulan($first_januari, $last_januari)->num_rows();

		//Februari
		$februari = 'February';
		$last_februari = date('Y-m-t', strtotime($tahun.'-'.$februari.'-01'));
		$first_februari = date('Y-m-01', strtotime($tahun.'-'.$februari.'-01'));
		$prFebruari = $this->prospek_model->jmlperbulan($first_februari, $last_februari)->num_rows();
		$suFebruari = $this->survey_model->jmlperbulan($first_februari, $last_februari)->num_rows();
		$peFebruari = $this->penagihan_model->jmlperbulan($first_februari, $last_februari)->num_rows();
		$tmFebruari = $this->telemarketing_model->jmlperbulan($first_februari, $last_februari)->num_rows();
		$ttFebruari = $this->teletagih_model->jmlperbulan($first_februari, $last_februari)->num_rows();

		//Maret
		$maret = 'March';
		$last_maret = date('Y-m-t', strtotime($tahun.'-'.$maret.'-01'));
		$first_maret = date('Y-m-01', strtotime($tahun.'-'.$maret.'-01'));
		$prMaret = $this->prospek_model->jmlperbulan($first_maret, $last_maret)->num_rows();
		$suMaret = $this->survey_model->jmlperbulan($first_maret, $last_maret)->num_rows();
		$peMaret = $this->penagihan_model->jmlperbulan($first_maret, $last_maret)->num_rows();
		$tmMaret = $this->telemarketing_model->jmlperbulan($first_maret, $last_maret)->num_rows();
		$ttMaret = $this->teletagih_model->jmlperbulan($first_maret, $last_maret)->num_rows();

		//april
		$april = 'April';
		$last_april = date('Y-m-t', strtotime($tahun.'-'.$april.'-01'));
		$first_april = date('Y-m-01', strtotime($tahun.'-'.$april.'-01'));
		$prApril = $this->prospek_model->jmlperbulan($first_april, $last_april)->num_rows();
		$suApril = $this->survey_model->jmlperbulan($first_april, $last_april)->num_rows();
		$peApril = $this->penagihan_model->jmlperbulan($first_april, $last_april)->num_rows();
		$tmApril = $this->telemarketing_model->jmlperbulan($first_april, $last_april)->num_rows();
		$ttApril = $this->teletagih_model->jmlperbulan($first_april, $last_april)->num_rows();

		//mei
		$mei = 'May';
		$last_mei = date('Y-m-t', strtotime($tahun.'-'.$mei.'-01'));
		$first_mei = date('Y-m-01', strtotime($tahun.'-'.$mei.'-01'));
		$prMei = $this->prospek_model->jmlperbulan($first_mei, $last_mei)->num_rows();
		$suMei = $this->survey_model->jmlperbulan($first_mei, $last_mei)->num_rows();
		$peMei = $this->penagihan_model->jmlperbulan($first_mei, $last_mei)->num_rows();
		$tmMei = $this->telemarketing_model->jmlperbulan($first_mei, $last_mei)->num_rows();
		$ttMei = $this->teletagih_model->jmlperbulan($first_mei, $last_mei)->num_rows();

		//juni
		$juni = 'June';
		$last_juni = date('Y-m-t', strtotime($tahun.'-'.$juni.'-01'));
		$first_juni = date('Y-m-01', strtotime($tahun.'-'.$juni.'-01'));
		$prJuni = $this->prospek_model->jmlperbulan($first_juni, $last_juni)->num_rows();
		$suJuni = $this->survey_model->jmlperbulan($first_juni, $last_juni)->num_rows();
		$peJuni = $this->penagihan_model->jmlperbulan($first_juni, $last_juni)->num_rows();
		$tmJuni = $this->telemarketing_model->jmlperbulan($first_juni, $last_juni)->num_rows();
		$ttJuni = $this->teletagih_model->jmlperbulan($first_juni, $last_juni)->num_rows();

		//juli
		$juli = 'July';
		$last_juli = date('Y-m-t', strtotime($tahun.'-'.$juli.'-01'));
		$first_juli = date('Y-m-01', strtotime($tahun.'-'.$juli.'-01'));
		$prJuli = $this->prospek_model->jmlperbulan($first_juli, $last_juli)->num_rows();
		$suJuli = $this->survey_model->jmlperbulan($first_juli, $last_juli)->num_rows();
		$peJuli = $this->penagihan_model->jmlperbulan($first_juli, $last_juli)->num_rows();
		$tmJuli = $this->telemarketing_model->jmlperbulan($first_juli, $last_juli)->num_rows();
		$ttJuli = $this->teletagih_model->jmlperbulan($first_juli, $last_juli)->num_rows();

		//agustus
		$agustus = 'August';
		$last_agustus = date('Y-m-t', strtotime($tahun.'-'.$agustus.'-01'));
		$first_agustus = date('Y-m-01', strtotime($tahun.'-'.$agustus.'-01'));
		$prAgustus = $this->prospek_model->jmlperbulan($first_agustus, $last_agustus)->num_rows();
		$suAgustus = $this->survey_model->jmlperbulan($first_agustus, $last_agustus)->num_rows();
		$peAgustus = $this->penagihan_model->jmlperbulan($first_agustus, $last_agustus)->num_rows();
		$tmAgustus = $this->telemarketing_model->jmlperbulan($first_agustus, $last_agustus)->num_rows();
		$ttAgustus = $this->teletagih_model->jmlperbulan($first_agustus, $last_agustus)->num_rows();

		//september
		$september = 'September';
		$last_september = date('Y-m-t', strtotime($tahun.'-'.$september.'-01'));
		$first_september = date('Y-m-01', strtotime($tahun.'-'.$september.'-01'));
		$prSeptember = $this->prospek_model->jmlperbulan($first_september, $last_september)->num_rows();
		$suSeptember = $this->survey_model->jmlperbulan($first_september, $last_september)->num_rows();
		$peSeptember = $this->penagihan_model->jmlperbulan($first_september, $last_september)->num_rows();
		$tmSeptember = $this->telemarketing_model->jmlperbulan($first_september, $last_september)->num_rows();
		$ttSeptember = $this->teletagih_model->jmlperbulan($first_september, $last_september)->num_rows();
		
		//oktober
		$oktober = 'October';
		$last_oktober = date('Y-m-t', strtotime($tahun.'-'.$oktober.'-01'));
		$first_oktober = date('Y-m-01', strtotime($tahun.'-'.$oktober.'-01'));
		$prOktober = $this->prospek_model->jmlperbulan($first_oktober, $last_oktober)->num_rows();
		$suOktober = $this->survey_model->jmlperbulan($first_oktober, $last_oktober)->num_rows();
		$peOktober = $this->penagihan_model->jmlperbulan($first_oktober, $last_oktober)->num_rows();
		$tmOktober = $this->telemarketing_model->jmlperbulan($first_oktober, $last_oktober)->num_rows();
		$ttOktober = $this->teletagih_model->jmlperbulan($first_oktober, $last_oktober)->num_rows();

		//november
		$november = 'November';
		$last_november = date('Y-m-t', strtotime($tahun.'-'.$november.'-01'));
		$first_november = date('Y-m-01', strtotime($tahun.'-'.$november.'-01'));
		$prNovember = $this->prospek_model->jmlperbulan($first_november, $last_november)->num_rows();
		$suNovember = $this->survey_model->jmlperbulan($first_november, $last_november)->num_rows();
		$peNovember = $this->penagihan_model->jmlperbulan($first_november, $last_november)->num_rows();
		$tmNovember = $this->telemarketing_model->jmlperbulan($first_november, $last_november)->num_rows();
		$ttNovember = $this->teletagih_model->jmlperbulan($first_november, $last_november)->num_rows();

		//desember
		$desember = 'December';
		$last_desember = date('Y-m-t', strtotime($tahun.'-'.$desember.'-01'));
		$first_desember = date('Y-m-01', strtotime($tahun.'-'.$desember.'-01'));
		$prDesember = $this->prospek_model->jmlperbulan($first_desember, $last_desember)->num_rows();
		$suDesember = $this->survey_model->jmlperbulan($first_desember, $last_desember)->num_rows();
		$peDesember = $this->penagihan_model->jmlperbulan($first_desember, $last_desember)->num_rows();
		$tmDesember = $this->telemarketing_model->jmlperbulan($first_desember, $last_desember)->num_rows();
		$ttDesember = $this->teletagih_model->jmlperbulan($first_desember, $last_desember)->num_rows();


		$data = array(
			'prJanuari' => $prJanuari,
			'prFebruari' => $prFebruari,
			'prMaret' => $prMaret,
			'prApril' => $prApril,
			'prMei' => $prMei,
			'prJuni' => $prJuni,
			'prJuli' => $prJuli,
			'prAgustus' => $prAgustus,
			'prSeptember' => $prSeptember,
			'prOktober' => $prOktober,
			'prNovember' => $prNovember,
			'prDesember' => $prDesember,
			'suJanuari' => $suJanuari,
			'suFebruari' => $suFebruari,
			'suMaret' => $suMaret,
			'suApril' => $suApril,
			'suMei' => $suMei,
			'suJuni' => $suJuni,
			'suJuli' => $suJuli,
			'suAgustus' => $suAgustus,
			'suSeptember' => $suSeptember,
			'suOktober' => $suOktober,
			'suNovember' => $suNovember,
			'suDesember' => $suDesember,
			'peJanuari' => $peJanuari,
			'peFebruari' => $peFebruari,
			'peMaret' => $peMaret,
			'peApril' => $peApril,
			'peMei' => $peMei,
			'peJuni' => $peJuni,
			'peJuli' => $peJuli,
			'peAgustus' => $peAgustus,
			'peSeptember' => $peSeptember,
			'peOktober' => $peOktober,
			'peNovember' => $peNovember,
			'peDesember' => $peDesember,
			'tmJanuari' => $tmJanuari,
			'tmFebruari' => $tmFebruari,
			'tmMaret' => $tmMaret,
			'tmApril' => $tmApril,
			'tmMei' => $tmMei,
			'tmJuni' => $tmJuni,
			'tmJuli' => $tmJuli,
			'tmAgustus' => $tmAgustus,
			'tmSeptember' => $tmSeptember,
			'tmOktober' => $tmOktober,
			'tmNovember' => $tmNovember,
			'tmDesember' => $tmDesember,
			'ttJanuari' => $ttJanuari,
			'ttFebruari' => $ttFebruari,
			'ttMaret' => $ttMaret,
			'ttApril' => $ttApril,
			'ttMei' => $ttMei,
			'ttJuni' => $ttJuni,
			'ttJuli' => $ttJuli,
			'ttAgustus' => $ttAgustus,
			'ttSeptember' => $ttSeptember,
			'ttOktober' => $ttOktober,
			'ttNovember' => $ttNovember,
			'ttDesember' => $ttDesember,
		);
    	echo json_encode($data);
	}

}
