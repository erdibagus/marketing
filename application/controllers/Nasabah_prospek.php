<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah_prospek extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('nasabah_prospek_model');
	$this->load->model('wilayah_model');
	$this->load->model('agunan_model');
  }

  public function ajax_list()
    {
        $list = $this->nasabah_prospek_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_nasabah_prospek."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_nasabah_prospek."'".')">'.$p->nama_nasabah_prospek.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_nasabah_prospek."'".')">'.$p->alamat.'';
            // $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_nasabah_prospek."'".')">'.$p->nama_kecamatan.'';
            // $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_nasabah_prospek."'".')">'.$p->nama_desa.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_nasabah_prospek."'".')">'.$p->no_tlp.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="nasabah_prospek/ubah/'.$p->id_nasabah_prospek.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_nasabah_prospek."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->nasabah_prospek_model->count_all(),
                        "recordsFiltered" => $this->nasabah_prospek_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
	
	public function index()
	{
		$data['title'] = 'Nasabah Prospek';
		// $data['nasabah_prospek'] = $this->nasabah_prospek_model->dataJoin()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('nasabah_prospek/index');
		$this->load->view('templates/footer');
    }

    public function tambah_prospek()
	{
        $data['title'] = 'Nasabah Prospek';

		$data['agunan'] = $this->agunan_model->data()->result();
        $data['jmlagunan'] = $this->agunan_model->data()->num_rows();
		$data['provinsi'] = $this->wilayah_model->getDataProv();
		$this->load->view('templates/header', $data);
		$this->load->view('nasabah_prospek/form_tambah_prospek');
		$this->load->view('templates/footer');
    }

	public function tambah_survey()
	{
        $data['title'] = 'Nasabah Prospek';

		$data['agunan'] = $this->agunan_model->data()->result();
        $data['jmlagunan'] = $this->agunan_model->data()->num_rows();
		$data['provinsi'] = $this->wilayah_model->getDataProv();
		$this->load->view('templates/header', $data);
		$this->load->view('nasabah_prospek/form_tambah_survey');
		$this->load->view('templates/footer');
    }

	public function tambah_teleprospek()
	{
        $data['title'] = 'Nasabah Prospek';

		$data['agunan'] = $this->agunan_model->data()->result();
        $data['jmlagunan'] = $this->agunan_model->data()->num_rows();
		$data['provinsi'] = $this->wilayah_model->getDataProv();
		$this->load->view('templates/header', $data);
		$this->load->view('nasabah_prospek/form_tambah_teleprospek');
		$this->load->view('templates/footer');
    }
    
    public function ubah($id)
	{
        $data['title'] = 'Nasabah Prospek';
		$data['nasabah_prospek'] = $this->nasabah_prospek_model->get('nasabah_prospek', ['id_nasabah_prospek' => $id]);
        //menampilkan data berdasarkan id
		$where = array('id_nasabah_prospek'=>$id);

		$data['agunan'] = $this->agunan_model->data()->result();
        $data['jmlagunan'] = $this->agunan_model->data()->num_rows();
		// $data['provinsi'] = $this->wilayah_model->data()->result();
        // $data['jmlprovinsi'] = $this->wilayah_model->data()->num_rows();
		$data['provinsi'] = $this->wilayah_model->getDataProv();
		
        $data['data'] = $this->nasabah_prospek_model->detail_data($where, 'nasabah_prospek')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('nasabah_prospek/form_ubah');
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$data['title'] = 'Nasabah';

        //menampilkan data berdasarkan id
        $data['data'] = $this->nasabah_prospek_model->detail_join($id, 'nasabah_prospek')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('nasabah_prospek/detail');
		$this->load->view('templates/footer');
	}

	public function proses_tambah_prospek()
	{       
		$nama_nasabah_prospek 	= $this->input->post('nama_nasabah_prospek');
		$alamat 		= $this->input->post('alamat');
		$provinsi 		= $this->input->post('provinsi');
		$kabupaten 		= $this->input->post('kabupaten');
        $kecamatan 		= $this->input->post('kecamatan');
        $desa 			= $this->input->post('desa');
        $no_tlp 		= $this->input->post('no_tlp');
		$usrinput 		= $this->session->userdata('login_session')['id_user'];
		
		$data=array(
			'nama_nasabah_prospek'=> $nama_nasabah_prospek,
			'alamat'=> $alamat,
			'provinsi'=> $provinsi,
			'kabupaten'=> $kabupaten,
            'kecamatan'=> $kecamatan,
            'desa' => $desa,
			'no_tlp' => $no_tlp,
			'user_id' => $usrinput
		);

		$this->nasabah_prospek_model->tambah_data($data, 'nasabah_prospek');
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
    	redirect('prospek/tambah');
	}

	public function proses_tambah_survey()
	{       
		$nama_nasabah_prospek 	= $this->input->post('nama_nasabah_prospek');
		$alamat 		= $this->input->post('alamat');
		$provinsi 		= $this->input->post('provinsi');
		$kabupaten 		= $this->input->post('kabupaten');
        $kecamatan 		= $this->input->post('kecamatan');
        $desa 			= $this->input->post('desa');
        $no_tlp 		= $this->input->post('no_tlp');
		$usrinput 		= $this->session->userdata('login_session')['id_user'];
		
		$data=array(
			'nama_nasabah_prospek'=> $nama_nasabah_prospek,
			'alamat'=> $alamat,
			'provinsi'=> $provinsi,
			'kabupaten'=> $kabupaten,
            'kecamatan'=> $kecamatan,
            'desa' => $desa,
			'no_tlp' => $no_tlp,
			'user_id' => $usrinput
		);

		$this->nasabah_prospek_model->tambah_data($data, 'nasabah_prospek');
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
    	redirect('survey/tambah');
	}

	public function proses_tambah_teleprospek()
	{       
		$nama_nasabah_prospek 	= $this->input->post('nama_nasabah_prospek');
		$alamat 		= $this->input->post('alamat');
		$provinsi 		= $this->input->post('provinsi');
		$kabupaten 		= $this->input->post('kabupaten');
        $kecamatan 		= $this->input->post('kecamatan');
        $desa 			= $this->input->post('desa');
        $no_tlp 		= $this->input->post('no_tlp');
		$usrinput 		= $this->session->userdata('login_session')['id_user'];
		
		$data=array(
			'nama_nasabah_prospek'=> $nama_nasabah_prospek,
			'alamat'=> $alamat,
			'provinsi'=> $provinsi,
			'kabupaten'=> $kabupaten,
            'kecamatan'=> $kecamatan,
            'desa' => $desa,
			'no_tlp' => $no_tlp,
			'user_id' => $usrinput
		);

		$this->nasabah_prospek_model->tambah_data($data, 'nasabah_prospek');
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
    	redirect('telemarketing/tambah');
	}

	public function proses_ubah()
	{      
		$id_nasabah_prospek 	= $this->input->post('id_nasabah_prospek');
		$nama_nasabah_prospek 	= $this->input->post('nama_nasabah_prospek');
		$alamat 		= $this->input->post('alamat');
		$kabupaten 		= $this->input->post('kabupaten');
        $kecamatan 		= $this->input->post('kecamatan');
        $desa 			= $this->input->post('desa');
        $no_tlp 		= $this->input->post('no_tlp');
		
		$data=array(
			'id_nasabah_prospek'=> $id_nasabah_prospek,
			'nama_nasabah_prospek'=> $nama_nasabah_prospek,
			'alamat'=> $alamat,
			'kabupaten'=> $kabupaten,
            'kecamatan'=> $kecamatan,
            'desa' => $desa,
			'no_tlp' => $no_tlp
		);

		$where = array(
			'id_nasabah_prospek'=>$id_nasabah_prospek
		);

		$this->nasabah_prospek_model->ubah_data($where, $data, 'nasabah_prospek');
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
    	redirect('nasabah_prospek');
	}

	public function proses_hapus($id)
	{
		$where = array('id_nasabah_prospek' => $id );
		
		$this->nasabah_prospek_model->hapus_data($where, 'nasabah_prospek');
	

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
		redirect('nasabah_prospek');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_nasabah_prospek' => $id );
    	$data = $this->nasabah_prospek_model->detail_data($where, 'nasabah_prospek')->result();
    	echo json_encode($data);
	}

}
