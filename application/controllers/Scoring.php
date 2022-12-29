<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scoring extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('scoring_model');
	$this->load->model('masterscoring_model');
	$this->load->model('survey_model');
  }

  public function ajax_list()
    {
        $list = $this->scoring_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
			$status = ($p->hasil >= 70)?'<span class="badge bg-gradient-success text-white">Layak</span>':'<span class="badge bg-gradient-danger text-white">Tidak Layak</span>';
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$p->nama_sistem_pinjam.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$p->jangka.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$p->plafon.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$status.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="scoring/ubah/'.$p->id_scoring.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_scoring."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->scoring_model->count_all(),
                        "recordsFiltered" => $this->scoring_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_user()
    {
        $list = $this->scoring_model->get_datatables_user();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
			$status = ($p->hasil >= 70)?'<span class="badge bg-gradient-success text-white">Layak</span>':'<span class="badge bg-gradient-danger text-white">Tidak Layak</span>';
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$p->nama_sistem_pinjam.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$p->jangka.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$p->plafon.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$status.'';
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->scoring_model->count_all(),
                        "recordsFiltered" => $this->scoring_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_manajer()
    {
        $list = $this->scoring_model->get_datatables_manajer();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
			$status = ($p->hasil >= 70)?'<span class="badge bg-gradient-success text-white">Layak</span>':'<span class="badge bg-gradient-danger text-white">Tidak Layak</span>';
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$p->nama_kategori.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$p->nama_sistem_pinjam.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$p->jangka.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$p->plafon.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_scoring."'".')">'.$status.'';
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->scoring_model->count_all(),
                        "recordsFiltered" => $this->scoring_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
	
	public function index()
	{
		$data['title'] = 'Scoring';

		$this->load->view('templates/header', $data);
		$this->load->view('scoring/index');
		$this->load->view('templates/footer');
    }

    public function tambah()
	{
        $data['title'] = 'scoring';

		$data['nasabah'] = $this->survey_model->datauser()->result();
		$data['jenis_kelamin'] = $this->masterscoring_model->datajenis_kelamin()->result();
		$data['usia'] = $this->masterscoring_model->datausia()->result();
		$data['status_pernikahan'] = $this->masterscoring_model->datastatus_pernikahan()->result();
		$data['tanggungan'] = $this->masterscoring_model->datatanggungan()->result();
		$data['lama_tinggal'] = $this->masterscoring_model->datalama_tinggal()->result();
		$data['lokasi_tinggal'] = $this->masterscoring_model->datalokasi_tinggal()->result();
		$data['jenis_tinggal'] = $this->masterscoring_model->datajenis_tinggal()->result();
		$data['memiliki_kendaraan'] = $this->masterscoring_model->datamemiliki_kendaraan()->result();
		$data['kepemilikan_kendaraan'] = $this->masterscoring_model->datakepemilikan_kendaraan()->result();
		$data['jenis_kendaraan'] = $this->masterscoring_model->datajenis_kendaraan()->result();
		$data['bentuk_perusahaan'] = $this->masterscoring_model->databentuk_perusahaan()->result();
		$data['lokasi_perusahaan'] = $this->masterscoring_model->datalokasi_perusahaan()->result();
		$data['masa_kerja'] = $this->masterscoring_model->datamasa_kerja()->result();
		$data['bidang_usaha'] = $this->masterscoring_model->databidang_usaha()->result();
		$data['bagian'] = $this->masterscoring_model->databagian()->result();
		$data['gaji'] = $this->masterscoring_model->datagaji()->result();
		$data['besar_pinjam'] = $this->masterscoring_model->databesar_pinjam()->result();
		$data['tenor_pinjam'] = $this->masterscoring_model->datatenor_pinjam()->result();
		$data['tujuan_pinjam'] = $this->masterscoring_model->datatujuan_pinjam()->result();
		$data['installment_ratio'] = $this->masterscoring_model->datainstallment_ratio()->result();
		$data['colateral_ratio'] = $this->masterscoring_model->datacolateral_ratio()->result();
		
		$this->load->view('templates/header', $data);
		$this->load->view('scoring/form_tambah');
		$this->load->view('templates/footer');
    }
    
    public function ubah($id)
	{
        $data['title'] = 'scoring';
		$data['nasabah'] = $this->survey_model->datauser()->result();
		$data['jenis_kelamin'] = $this->masterscoring_model->datajenis_kelamin()->result();
		$data['usia'] = $this->masterscoring_model->datausia()->result();
		$data['status_pernikahan'] = $this->masterscoring_model->datastatus_pernikahan()->result();
		$data['tanggungan'] = $this->masterscoring_model->datatanggungan()->result();
		$data['lama_tinggal'] = $this->masterscoring_model->datalama_tinggal()->result();
		$data['lokasi_tinggal'] = $this->masterscoring_model->datalokasi_tinggal()->result();
		$data['jenis_tinggal'] = $this->masterscoring_model->datajenis_tinggal()->result();
		$data['memiliki_kendaraan'] = $this->masterscoring_model->datamemiliki_kendaraan()->result();
		$data['kepemilikan_kendaraan'] = $this->masterscoring_model->datakepemilikan_kendaraan()->result();
		$data['jenis_kendaraan'] = $this->masterscoring_model->datajenis_kendaraan()->result();
		$data['bentuk_perusahaan'] = $this->masterscoring_model->databentuk_perusahaan()->result();
		$data['lokasi_perusahaan'] = $this->masterscoring_model->datalokasi_perusahaan()->result();
		$data['masa_kerja'] = $this->masterscoring_model->datamasa_kerja()->result();
		$data['bidang_usaha'] = $this->masterscoring_model->databidang_usaha()->result();
		$data['bagian'] = $this->masterscoring_model->databagian()->result();
		$data['gaji'] = $this->masterscoring_model->datagaji()->result();
		$data['besar_pinjam'] = $this->masterscoring_model->databesar_pinjam()->result();
		$data['tenor_pinjam'] = $this->masterscoring_model->datatenor_pinjam()->result();
		$data['tujuan_pinjam'] = $this->masterscoring_model->datatujuan_pinjam()->result();
		$data['installment_ratio'] = $this->masterscoring_model->datainstallment_ratio()->result();
		$data['colateral_ratio'] = $this->masterscoring_model->datacolateral_ratio()->result();
		
        $data['data'] = $this->scoring_model->detail_join($id)->result();

		$this->load->view('templates/header', $data);
		$this->load->view('scoring/form_ubah');
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$data['title'] = 'scoring';

        //menampilkan data berdasarkan id
        $data['data'] = $this->scoring_model->detail_join($id, 'scoring')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('scoring/detail');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$nasabah 			= $this->input->post('nasabah');
		$jenis_kelamin 			= $this->input->post('jenis_kelamin');
		$usia 			= $this->input->post('usia');
		$status_pernikahan 			= $this->input->post('status_pernikahan');
		$tanggungan 			= $this->input->post('tanggungan');
		$lama_tinggal 			= $this->input->post('lama_tinggal');
		$lokasi_tinggal 			= $this->input->post('lokasi_tinggal');
		$jenis_tinggal 			= $this->input->post('jenis_tinggal');
		$memiliki_kendaraan 			= $this->input->post('memiliki_kendaraan');
		$kepemilikan_kendaraan 			= $this->input->post('kepemilikan_kendaraan');
		$jenis_kendaraan 			= $this->input->post('jenis_kendaraan');
		$bentuk_perusahaan 			= $this->input->post('bentuk_perusahaan');
		$lokasi_perusahaan 			= $this->input->post('lokasi_perusahaan');
		$masa_kerja 			= $this->input->post('masa_kerja');
		$bidang_usaha 			= $this->input->post('bidang_usaha');
		$bagian 			= $this->input->post('bagian');
		$gaji 			= $this->input->post('gaji');
		$besar_pinjam 			= $this->input->post('besar_pinjam');
		$tenor_pinjam 			= $this->input->post('tenor_pinjam');
		$tujuan_pinjam 			= $this->input->post('tujuan_pinjam');
		$installment 			= $this->input->post('installment');
		$colateral 			= $this->input->post('colateral');
		
		$jenis_kelamin1 = explode('|', $jenis_kelamin);
		$jenis_kelamin2 = $jenis_kelamin1[0];
		$jenis_kelamin3 = $jenis_kelamin1[1];

		$usia1 = explode('|', $usia);
		$usia2 = $usia1[0];
		$usia3 = $usia1[1];

		$status_pernikahan1 = explode('|', $status_pernikahan);
		$status_pernikahan2 = $status_pernikahan1[0];
		$status_pernikahan3 = $status_pernikahan1[1];

		$tanggungan1 = explode('|', $tanggungan);
		$tanggungan2 = $tanggungan1[0];
		$tanggungan3 = $tanggungan1[1];

		$lama_tinggal1 = explode('|', $lama_tinggal);
		$lama_tinggal2 = $lama_tinggal1[0];
		$lama_tinggal3 = $lama_tinggal1[1];

		$lokasi_tinggal1 = explode('|', $lokasi_tinggal);
		$lokasi_tinggal2 = $lokasi_tinggal1[0];
		$lokasi_tinggal3 = $lokasi_tinggal1[1];

		$jenis_tinggal1 = explode('|', $jenis_tinggal);
		$jenis_tinggal2 = $jenis_tinggal1[0];
		$jenis_tinggal3 = $jenis_tinggal1[1];

		$memiliki_kendaraan1 = explode('|', $memiliki_kendaraan);
		$memiliki_kendaraan2 = $memiliki_kendaraan1[0];
		$memiliki_kendaraan3 = $memiliki_kendaraan1[1];

		$kepemilikan_kendaraan1 = explode('|', $kepemilikan_kendaraan);
		$kepemilikan_kendaraan2 = $kepemilikan_kendaraan1[0];
		$kepemilikan_kendaraan3 = $kepemilikan_kendaraan1[1];

		$jenis_kendaraan1 = explode('|', $jenis_kendaraan);
		$jenis_kendaraan2 = $jenis_kendaraan1[0];
		$jenis_kendaraan3 = $jenis_kendaraan1[1];

		$bentuk_perusahaan1 = explode('|', $bentuk_perusahaan);
		$bentuk_perusahaan2 = $bentuk_perusahaan1[0];
		$bentuk_perusahaan3 = $bentuk_perusahaan1[1];

		$lokasi_perusahaan1 = explode('|', $lokasi_perusahaan);
		$lokasi_perusahaan2 = $lokasi_perusahaan1[0];
		$lokasi_perusahaan3 = $lokasi_perusahaan1[1];

		$masa_kerja1 = explode('|', $masa_kerja);
		$masa_kerja2 = $masa_kerja1[0];
		$masa_kerja3 = $masa_kerja1[1];

		$bidang_usaha1 = explode('|', $bidang_usaha);
		$bidang_usaha2 = $bidang_usaha1[0];
		$bidang_usaha3 = $bidang_usaha1[1];

		$bagian1 = explode('|', $bagian);
		$bagian2 = $bagian1[0];
		$bagian3 = $bagian1[1];

		$gaji1 = explode('|', $gaji);
		$gaji2 = $gaji1[0];
		$gaji3 = $gaji1[1];

		$besar_pinjam1 = explode('|', $besar_pinjam);
		$besar_pinjam2 = $besar_pinjam1[0];
		$besar_pinjam3 = $besar_pinjam1[1];

		$tenor_pinjam1 = explode('|', $tenor_pinjam);
		$tenor_pinjam2 = $tenor_pinjam1[0];
		$tenor_pinjam3 = $tenor_pinjam1[1];

		$tujuan_pinjam1 = explode('|', $tujuan_pinjam);
		$tujuan_pinjam2 = $tujuan_pinjam1[0];
		$tujuan_pinjam3 = $tujuan_pinjam1[1];

		 
		if($installment > 70){
			$installmentratio = 5;
		  } else if($installment >60){
			$installmentratio = 20;
		  } else if($installment >50){
			$installmentratio = 40;
		  } else if($installment >40){
			$installmentratio = 60;
		  } else if($installment >30){
			$installmentratio = 80;
		  } else if($installment >0) {
			$installmentratio = 100;
		  }
		  
		
		  if($colateral >80){
			$colateralratio = 5;
		  } else if($colateral >70){
			$colateralratio = 20;
		  } else if($colateral >60){
			$colateralratio = 40;
		  } else if($colateral >50){
			$colateralratio = 60;
		  } else if($colateral >40){
			$colateralratio = 80;
		  } else if($colateral >0) {
			$colateralratio = 100;
		  }


		$sosialpeminjam = 	$jenis_kelamin3 + $usia3 + $status_pernikahan3 + $tanggungan3 + $lama_tinggal3 + $lokasi_tinggal3 +
							$jenis_tinggal3 + $memiliki_kendaraan3 + $kepemilikan_kendaraan3 + $jenis_kendaraan3;
							
		$pekerjaanpeminjam = $bentuk_perusahaan3 + $lokasi_perusahaan3 + $masa_kerja3 + $bidang_usaha3 + $bagian3 + $gaji3;


		$totalsosialpeminjam = $sosialpeminjam / 10000 * 100;
		$totalpekerjaanpeminjam = $pekerjaanpeminjam / 6000 * 100;
		$besarpinjaman = $besar_pinjam3 / 500 * 100;
		$tenorpinjaman = $tenor_pinjam3 / 1000 * 100;
		$tujuanpinjaman = $tujuan_pinjam3 / 2334 * 100;
		$installmentratio1 = $installmentratio / 454.6 * 100;
		$colateralratio1 = $colateralratio / 454.6 * 100;

		$total = 	$totalsosialpeminjam + $totalpekerjaanpeminjam +
					$besarpinjaman + $tenorpinjaman + $tujuanpinjaman + $installmentratio1 + $colateralratio1;
		
		$data=array(
			'survey_id' => $nasabah,
			'jenis_kelamin' => $jenis_kelamin2,
			'usia' => $usia2,
			'status_pernikahan' => $status_pernikahan2,
			'tanggungan' => $tanggungan2,
			'lama_tinggal' => $lama_tinggal2,
			'lokasi_tinggal' => $lokasi_tinggal2,
			'jenis_tinggal' => $jenis_tinggal2,
			'memiliki_kendaraan' => $memiliki_kendaraan2,
			'kepemilikan_kendaraan' => $kepemilikan_kendaraan2,
			'jenis_kendaraan' => $jenis_kendaraan2,
			'bentuk_perusahaan' => $bentuk_perusahaan2,
			'lokasi_perusahaan' => $lokasi_perusahaan2,
			'masa_kerja' => $masa_kerja2,
			'bidang_usaha' => $bidang_usaha2,
			'bagian' => $bagian2,
			'gaji' => $gaji2,
			'besar_pinjam' => $besar_pinjam2,
			'tenor_pinjam' => $tenor_pinjam2,
			'tujuan_pinjam' => $tujuan_pinjam2,
			'installment_ratio' => $installment,
			'colateral_ratio' => $colateral,
			'hasil' => $total
		);

		$this->scoring_model->tambah_data($data, 'scoring');
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
    	redirect('scoring');
	}

	public function proses_ubah()
	{
        $this->load->library('upload', $config);
        
		$id_scoring 			= $this->input->post('idscoring');
		$nasabah 			= $this->input->post('nasabah');
		$jenis_kelamin 			= $this->input->post('jenis_kelamin');
		$usia 			= $this->input->post('usia');
		$status_pernikahan 			= $this->input->post('status_pernikahan');
		$tanggungan 			= $this->input->post('tanggungan');
		$lama_tinggal 			= $this->input->post('lama_tinggal');
		$lokasi_tinggal 			= $this->input->post('lokasi_tinggal');
		$jenis_tinggal 			= $this->input->post('jenis_tinggal');
		$memiliki_kendaraan 			= $this->input->post('memiliki_kendaraan');
		$kepemilikan_kendaraan 			= $this->input->post('kepemilikan_kendaraan');
		$jenis_kendaraan 			= $this->input->post('jenis_kendaraan');
		$bentuk_perusahaan 			= $this->input->post('bentuk_perusahaan');
		$lokasi_perusahaan 			= $this->input->post('lokasi_perusahaan');
		$masa_kerja 			= $this->input->post('masa_kerja');
		$bidang_usaha 			= $this->input->post('bidang_usaha');
		$bagian 			= $this->input->post('bagian');
		$gaji 			= $this->input->post('gaji');
		$besar_pinjam 			= $this->input->post('besar_pinjam');
		$tenor_pinjam 			= $this->input->post('tenor_pinjam');
		$tujuan_pinjam 			= $this->input->post('tujuan_pinjam');
		$installment 			= $this->input->post('installment');
		$colateral 			= $this->input->post('colateral');
		
		$jenis_kelamin1 = explode('|', $jenis_kelamin);
		$jenis_kelamin2 = $jenis_kelamin1[0];
		$jenis_kelamin3 = $jenis_kelamin1[1];

		$usia1 = explode('|', $usia);
		$usia2 = $usia1[0];
		$usia3 = $usia1[1];

		$status_pernikahan1 = explode('|', $status_pernikahan);
		$status_pernikahan2 = $status_pernikahan1[0];
		$status_pernikahan3 = $status_pernikahan1[1];

		$tanggungan1 = explode('|', $tanggungan);
		$tanggungan2 = $tanggungan1[0];
		$tanggungan3 = $tanggungan1[1];

		$lama_tinggal1 = explode('|', $lama_tinggal);
		$lama_tinggal2 = $lama_tinggal1[0];
		$lama_tinggal3 = $lama_tinggal1[1];

		$lokasi_tinggal1 = explode('|', $lokasi_tinggal);
		$lokasi_tinggal2 = $lokasi_tinggal1[0];
		$lokasi_tinggal3 = $lokasi_tinggal1[1];

		$jenis_tinggal1 = explode('|', $jenis_tinggal);
		$jenis_tinggal2 = $jenis_tinggal1[0];
		$jenis_tinggal3 = $jenis_tinggal1[1];

		$memiliki_kendaraan1 = explode('|', $memiliki_kendaraan);
		$memiliki_kendaraan2 = $memiliki_kendaraan1[0];
		$memiliki_kendaraan3 = $memiliki_kendaraan1[1];

		$kepemilikan_kendaraan1 = explode('|', $kepemilikan_kendaraan);
		$kepemilikan_kendaraan2 = $kepemilikan_kendaraan1[0];
		$kepemilikan_kendaraan3 = $kepemilikan_kendaraan1[1];

		$jenis_kendaraan1 = explode('|', $jenis_kendaraan);
		$jenis_kendaraan2 = $jenis_kendaraan1[0];
		$jenis_kendaraan3 = $jenis_kendaraan1[1];

		$bentuk_perusahaan1 = explode('|', $bentuk_perusahaan);
		$bentuk_perusahaan2 = $bentuk_perusahaan1[0];
		$bentuk_perusahaan3 = $bentuk_perusahaan1[1];

		$lokasi_perusahaan1 = explode('|', $lokasi_perusahaan);
		$lokasi_perusahaan2 = $lokasi_perusahaan1[0];
		$lokasi_perusahaan3 = $lokasi_perusahaan1[1];

		$masa_kerja1 = explode('|', $masa_kerja);
		$masa_kerja2 = $masa_kerja1[0];
		$masa_kerja3 = $masa_kerja1[1];

		$bidang_usaha1 = explode('|', $bidang_usaha);
		$bidang_usaha2 = $bidang_usaha1[0];
		$bidang_usaha3 = $bidang_usaha1[1];

		$bagian1 = explode('|', $bagian);
		$bagian2 = $bagian1[0];
		$bagian3 = $bagian1[1];

		$gaji1 = explode('|', $gaji);
		$gaji2 = $gaji1[0];
		$gaji3 = $gaji1[1];

		$besar_pinjam1 = explode('|', $besar_pinjam);
		$besar_pinjam2 = $besar_pinjam1[0];
		$besar_pinjam3 = $besar_pinjam1[1];

		$tenor_pinjam1 = explode('|', $tenor_pinjam);
		$tenor_pinjam2 = $tenor_pinjam1[0];
		$tenor_pinjam3 = $tenor_pinjam1[1];

		$tujuan_pinjam1 = explode('|', $tujuan_pinjam);
		$tujuan_pinjam2 = $tujuan_pinjam1[0];
		$tujuan_pinjam3 = $tujuan_pinjam1[1];

		 
		if($installment > 70){
			$installmentratio = 5;
		  } else if($installment >60){
			$installmentratio = 20;
		  } else if($installment >50){
			$installmentratio = 40;
		  } else if($installment >40){
			$installmentratio = 60;
		  } else if($installment >30){
			$installmentratio = 80;
		  } else if($installment >0) {
			$installmentratio = 100;
		  }
		  
		
		  if($colateral >80){
			$colateralratio = 5;
		  } else if($colateral >70){
			$colateralratio = 20;
		  } else if($colateral >60){
			$colateralratio = 40;
		  } else if($colateral >50){
			$colateralratio = 60;
		  } else if($colateral >40){
			$colateralratio = 80;
		  } else if($colateral >0) {
			$colateralratio = 100;
		  }


		$sosialpeminjam = 	$jenis_kelamin3 + $usia3 + $status_pernikahan3 + $tanggungan3 + $lama_tinggal3 + $lokasi_tinggal3 +
							$jenis_tinggal3 + $memiliki_kendaraan3 + $kepemilikan_kendaraan3 + $jenis_kendaraan3;
							
		$pekerjaanpeminjam = $bentuk_perusahaan3 + $lokasi_perusahaan3 + $masa_kerja3 + $bidang_usaha3 + $bagian3 + $gaji3;

		$totalsosialpeminjam = $sosialpeminjam / 10000 * 100;
		$totalpekerjaanpeminjam = $pekerjaanpeminjam / 6000 * 100;
		$besarpinjaman = $besar_pinjam3 / 500 * 100;
		$tenorpinjaman = $tenor_pinjam3 / 1000 * 100;
		$tujuanpinjaman = $tujuan_pinjam3 / 2334 * 100;
		$installmentratio1 = $installmentratio / 454.6 * 100;
		$colateralratio1 = $colateralratio / 454.6 * 100;

		$total = 	$totalsosialpeminjam + $totalpekerjaanpeminjam +
					$besarpinjaman + $tenorpinjaman + $tujuanpinjaman + $installmentratio1 + $colateralratio1;
		
		$data=array(
			'id_scoring' => $id_scoring,
			'survey_id' => $nasabah,
			'jenis_kelamin' => $jenis_kelamin2,
			'usia' => $usia2,
			'status_pernikahan' => $status_pernikahan2,
			'tanggungan' => $tanggungan2,
			'lama_tinggal' => $lama_tinggal2,
			'lokasi_tinggal' => $lokasi_tinggal2,
			'jenis_tinggal' => $jenis_tinggal2,
			'memiliki_kendaraan' => $memiliki_kendaraan2,
			'kepemilikan_kendaraan' => $kepemilikan_kendaraan2,
			'jenis_kendaraan' => $jenis_kendaraan2,
			'bentuk_perusahaan' => $bentuk_perusahaan2,
			'lokasi_perusahaan' => $lokasi_perusahaan2,
			'masa_kerja' => $masa_kerja2,
			'bidang_usaha' => $bidang_usaha2,
			'bagian' => $bagian2,
			'gaji' => $gaji2,
			'besar_pinjam' => $besar_pinjam2,
			'tenor_pinjam' => $tenor_pinjam2,
			'tujuan_pinjam' => $tujuan_pinjam2,
			'installment_ratio' => $installment,
			'colateral_ratio' => $colateral,
			'hasil' => $total			
		);

		$where = array(
			'id_scoring'=>$id_scoring
		);

		$this->scoring_model->ubah_data($where, $data, 'scoring');
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
    	redirect('scoring');
	}

	public function proses_hapus($id)
	{
		$where = array('id_scoring' => $id );
		
		$this->scoring_model->hapus_data($where, 'scoring');
	

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
		redirect('scoring');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_scoring' => $id );
    	$data = $this->scoring_model->detail_data($where, 'scoring')->result();
    	echo json_encode($data);
	}

}
