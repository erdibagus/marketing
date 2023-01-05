<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Storting extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('storting_model');
	$this->load->model('user_model');
  }

  public function ajax_list()
    {
        $list = $this->storting_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = ''.$p->bulan.' '.$p->tahun.'';
            $row[] = $p->nama;
            $row[] = $p->rek;
            $row[] = $p->nama_nasabah;
            $row[] = $p->alamat;
            $row[] = $p->realisasi;
            $row[] = $p->jatuh_tempo;
            $row[] = $p->plafon;
            $row[] = $p->baki_debet;
            $row[] = $p->pokok;
            $row[] = $p->bunga;
            $row[] = $p->denda;
            $row[] = $p->kolektabilitas;
            $row[] = $p->no_hp;
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->storting_model->count_all(),
                        "recordsFiltered" => $this->storting_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_manajer()
    {
        $list = $this->storting_model->get_datatables_manajer();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = ''.$p->bulan.' '.$p->tahun.'';
			$row[] = $p->nama;
            $row[] = $p->rek;
            $row[] = $p->nama_nasabah;
            $row[] = $p->alamat;
            $row[] = $p->realisasi;
            $row[] = $p->jatuh_tempo;
            $row[] = $p->plafon;
            $row[] = $p->baki_debet;
            $row[] = $p->pokok;
            $row[] = $p->bunga;
            $row[] = $p->denda;
            $row[] = $p->kolektabilitas;
            $row[] = $p->no_hp;
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->storting_model->count_all_manajer(),
                        "recordsFiltered" => $this->storting_model->count_filtered_manajer(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_peruser()
    {
        $list = $this->storting_model->get_datatables_peruser();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = ''.$p->bulan.' '.$p->tahun.'';
            $row[] = $p->rek;
            $row[] = $p->nama_nasabah;
            $row[] = $p->alamat;
            $row[] = $p->realisasi;
            $row[] = $p->jatuh_tempo;
            $row[] = $p->plafon;
            $row[] = $p->baki_debet;
            $row[] = $p->pokok;
            $row[] = $p->bunga;
            $row[] = $p->denda;
            $row[] = $p->kolektabilitas;
            $row[] = $p->no_hp;
            $row[] = '
			<a href="#" data-toggle="modal" data-target="#formU" onclick="ambilData('."'".$p->id_storting."'".')"class="btn text-white bg-gradient-success btn-sm">Selesai</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->storting_model->count_all_peruser(),
                        "recordsFiltered" => $this->storting_model->count_filtered_peruser(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_selesai()
    {
        $list = $this->storting_model->get_datatables_selesai();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->bulan.' '.$p->tahun.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->rek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->realisasi.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->jatuh_tempo.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->plafon.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->baki_debet.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->pokok.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->bunga.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->denda.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->kolektabilitas.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->no_hp.'';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->storting_model->count_all_selesai(),
                        "recordsFiltered" => $this->storting_model->count_filtered_selesai(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_selesai_manajer()
    {
        $list = $this->storting_model->get_datatables_selesai_manajer();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->bulan.' '.$p->tahun.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->nama.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->rek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->realisasi.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->jatuh_tempo.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->plafon.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->baki_debet.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->pokok.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->bunga.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->denda.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->kolektabilitas.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->no_hp.'';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->storting_model->count_all_selesai_manajer(),
                        "recordsFiltered" => $this->storting_model->count_filtered_selesai_manajer(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_selesai_peruser()
    {
        $list = $this->storting_model->get_datatables_selesai_peruser();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->bulan.' '.$p->tahun.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->rek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->realisasi.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->jatuh_tempo.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->plafon.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->baki_debet.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->pokok.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->bunga.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->denda.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->kolektabilitas.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->no_hp.'';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->storting_model->count_all_selesai_peruser(),
                        "recordsFiltered" => $this->storting_model->count_filtered_selesai_peruser(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_user($usercek)
    {
        $list = $this->storting_model->get_datatables_user($usercek);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $p->rek;
            $row[] = $p->nama_nasabah;
            $row[] = $p->alamat;
            $row[] = $p->realisasi;
            $row[] = $p->jatuh_tempo;
            $row[] = $p->plafon;
            $row[] = $p->baki_debet;
            $row[] = $p->pokok;
            $row[] = $p->bunga;
            $row[] = $p->denda;
            $row[] = $p->kolektabilitas;
            $row[] = $p->no_hp;
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->storting_model->count_all_user($usercek),
                        "recordsFiltered" => $this->storting_model->count_filtered_user($usercek),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_list_cek($tahun, $bulan, $user)
    {
        $list = $this->storting_model->get_datatables_cek($tahun, $bulan, $user);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->rek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->realisasi.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->jatuh_tempo.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->plafon.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->baki_debet.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->pokok.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->bunga.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->denda.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->kolektabilitas.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_storting."'".')">'.$p->no_hp.'';
            $row[] = '
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_storting."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->storting_model->count_all_cek($tahun, $bulan, $user),
                        "recordsFiltered" => $this->storting_model->count_filtered_cek($tahun, $bulan, $user),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
	
	public function index()
	{
		$data['title'] = 'Storting';
		

		$this->load->view('templates/header', $data);
		$this->load->view('storting/index');
		$this->load->view('templates/footer');
	}

	public function import()
	{
		$data['title'] = 'Import';
		$data['user'] = $this->user_model->datauserupload();
		$data['usercek'] = $this->user_model->data()->result();
		$data['yearnow']=date('Y', strtotime('+0 year'));
		$data['nextyear']=date('Y', strtotime('+1 year'));

		$this->load->view('templates/header', $data);
		$this->load->view('storting/import');
		$this->load->view('templates/footer');
	}

	public function cek_storting()
	{
		$data['title'] = 'Cek Storting';
		$data['user'] = $this->user_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('storting/cek_storting');
		$this->load->view('templates/footer');
	}

    public function import_storting()
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
            $user = 			$this->input->post('user');
            $bulan = 			$this->input->post('bulan');
            $tahun = 			$this->input->post('tahun');
            $status = 			$this->input->post('status');

            $user1 = explode('|', $user);
            $user_id = $user1[0];
            $kpk = $user1[1];

			$data=array();
			for ($i=1; $i < $sheetcount; $i++) { 
				$rek=$sheetdata[$i][0];
				$nama_nasabah=$sheetdata[$i][1];
				$alamat=$sheetdata[$i][2];
				$realisasi=$sheetdata[$i][3];
				$jatuh_tempo=$sheetdata[$i][4];
				$plafon=$sheetdata[$i][5];
				$baki_debet=$sheetdata[$i][6];
				$pokok=$sheetdata[$i][7];
				$bunga=$sheetdata[$i][8];
				$denda=$sheetdata[$i][9];
				$kol=$sheetdata[$i][10];
				$no_hp=$sheetdata[$i][11];
				$data[]=array(
					'rek'      => $rek,
                    'nama_nasabah'  => $nama_nasabah,
                    'alamat'  => $alamat,
                    'realisasi'  => $realisasi,
                    'jatuh_tempo'  => $jatuh_tempo,
                    'plafon'  => $plafon,
                    'baki_debet'  => $baki_debet,
                    'pokok'  => $pokok,
                    'bunga'  => $bunga,
                    'denda'  => $denda,
                    'kolektabilitas'  => $kol,
                    'no_hp'  => $no_hp,
                    'user_id'  => $user_id,
                    'kpk'  => $kpk,
                    'bulan'  => $bulan,
                    'tahun'  => $tahun,
                    'status'  => $status,
				);
			}
			$inserdata=$this->storting_model->insert_batch($data);
			if($inserdata)
			{
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
			//redirect halaman
			redirect('import');
			} else {
			$this->session->set_flashdata('Pesan','
			<script>
			$(document).ready(function() {
				swal.fire({
					title: "Data Error!",
					icon: "success",
					confirmButtonColor: "#4e73df",
				});
			});
			</script>
			');
			//redirect halaman
			redirect('import');
			}
		}
	}

	public function proses_ubah()
	{
        $kode = $this->input->post('idstorting');
		$keterangan = $this->input->post('keterangan');
		$status = $this->input->post('status');
		
		$data=array(
			'keterangan_storting'=> $keterangan,
			'status'=> $status,
		);

		$where = array(
			'id_storting'=>$kode
		);

		$this->storting_model->ubah_data($where, $data, 'storting');
    	redirect('storting');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_storting' => $id );
    	$data = $this->storting_model->detail_data($where, 'storting')->result();
    	echo json_encode($data);
	}

	public function proses_hapus($id)
	{
		$where = array('id_storting' => $id );
		$this->storting_model->hapus_data($where, 'storting');
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
		redirect('cek_storting');
	}

	public function hapus_data_kosong()
	{
		$this->storting_model->hapus_data_kosong(); // Panggil fungsi delete dari model
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
		redirect('import');
	}

	public function detail($id)
	{
		$data['title'] = 'Storting';
    
		//menampilkan data berdasarkan id
		$data['data'] = $this->storting_model->detailJoin($id)->result();


		$this->load->view('templates/header', $data);
		$this->load->view('storting/detail');
		$this->load->view('templates/footer');
	}

}
