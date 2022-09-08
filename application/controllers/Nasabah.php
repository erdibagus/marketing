<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('nasabah_model');
	$this->load->model('wilayah_model');
	$this->load->model('agunan_model');
  }

  public function ajax_list()
    {
        $list = $this->nasabah_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_nasabah."'".')">'.$no.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_nasabah."'".')">'.$p->no_pmp.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_nasabah."'".')">'.$p->nama_nasabah.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_nasabah."'".')">'.$p->alamat.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_nasabah."'".')">'.$p->nama_kecamatan.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_nasabah."'".')">'.$p->nama_desa.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_nasabah."'".')">'.$p->nama_agunan.'';
            $row[] = '<javascript:void(0) onclick="detail('."'".$p->id_nasabah."'".')">'.$p->no_tlp.'';
            $row[] = '
			<a class="btn btn-sm btn-primary" href="nasabah/ubah/'.$p->id_nasabah.'">Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="konfirmasi('."'".$p->id_nasabah."'".')">Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->nasabah_model->count_all(),
                        "recordsFiltered" => $this->nasabah_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
	
	public function index()
	{
		$data['title'] = 'Nasabah';
		$data['nasabah'] = $this->nasabah_model->dataJoin()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('nasabah/index');
		$this->load->view('templates/footer');
    }

	public function getKabupaten()
    {
        $kabupatenId = $this->input->post('kabupaten');
        $idprov = $this->input->post('id');
        $data = $this->wilayah_model->getDatakabupaten($idprov);
        $output = '<option value="">--Pilih Kabupaten-- </option>';
        foreach ($data as $row) {
            if ($kabupatenId) { //edit
                if ($kabupatenId == $row->id) {
                    $output .= '<option value="' . $row->id . '" selected> ' . $row->nama_kabupaten . '</option>';
                } else {
                    $output .= '<option value="' . $row->id . '"> ' . $row->nama_kabupaten . '</option>';
                }
            } else { //tambah
                $output .= '<option value="' . $row->id . '"> ' . $row->nama_kabupaten . '</option>';
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function getKecamatan()
    {
        $kecamatanId = $this->input->post('kecamatan');
        $idkabupaten = $this->input->post('id');
        $data = $this->wilayah_model->getDatakecamatan($idkabupaten);
        $output = '<option value="">--Pilih Kecamatan-- </option>';
        foreach ($data as $row) {
            if ($kecamatanId) { //edit
                if ($kecamatanId == $row->id) {
                    $output .= '<option value="' . $row->id . '" selected> ' . $row->nama_kecamatan . '</option>';
                } else {
                    $output .= '<option value="' . $row->id . '"> ' . $row->nama_kecamatan . '</option>';
                }
            } else { //tambah
                $output .= '<option value="' . $row->id . '"> ' . $row->nama_kecamatan . '</option>';
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function getDesa()
    {
        $desaId = $this->input->post('desa');
        $idkecamatan = $this->input->post('id');
        $data = $this->wilayah_model->getDataDesa($idkecamatan);
        $output = '<option value="">--Pilih Desa-- </option>';
        foreach ($data as $row) {
            if ($desaId) { //edit
                if ($desaId == $row->id) {
                    $output .= '<option value="' . $row->id . '" selected> ' . $row->nama_desa . '</option>';
                } else {
                    $output .= '<option value="' . $row->id . '"> ' . $row->nama_desa . '</option>';
                }
            } else { //tambah
                $output .= '<option value="' . $row->id . '"> ' . $row->nama_desa . '</option>';
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function tambah_penagihan()
	{
        $data['title'] = 'Nasabah';

		$data['agunan'] = $this->agunan_model->data()->result();
        $data['jmlagunan'] = $this->agunan_model->data()->num_rows();
		$data['provinsi'] = $this->wilayah_model->getDataProv();
		$this->load->view('templates/header', $data);
		$this->load->view('nasabah/form_tambah_penagihan');
		$this->load->view('templates/footer');
    }

	public function tambah_teletagih()
	{
        $data['title'] = 'Nasabah';

		$data['agunan'] = $this->agunan_model->data()->result();
        $data['jmlagunan'] = $this->agunan_model->data()->num_rows();
		$data['provinsi'] = $this->wilayah_model->getDataProv();
		$this->load->view('templates/header', $data);
		$this->load->view('nasabah/form_tambah_teletagih');
		$this->load->view('templates/footer');
    }
    
    public function ubah($id)
	{
        $data['title'] = 'Nasabah';
		$data['nasabah'] = $this->nasabah_model->get('nasabah', ['id_nasabah' => $id]);
        //menampilkan data berdasarkan id
		$where = array('id_nasabah'=>$id);

		$data['agunan'] = $this->agunan_model->data()->result();
        $data['jmlagunan'] = $this->agunan_model->data()->num_rows();
		// $data['provinsi'] = $this->wilayah_model->data()->result();
        // $data['jmlprovinsi'] = $this->wilayah_model->data()->num_rows();
		$data['provinsi'] = $this->wilayah_model->getDataProv();
		
        $data['data'] = $this->nasabah_model->detail_data($where, 'nasabah')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('nasabah/form_ubah');
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$data['title'] = 'Nasabah';

        //menampilkan data berdasarkan id
        $data['data'] = $this->nasabah_model->detail_join($id, 'nasabah')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('nasabah/detail');
		$this->load->view('templates/footer');
	}

	public function proses_tambah_penagihan()
	{
        
		$pmp 			= $this->input->post('no_pmp');
		$nama_nasabah 	= $this->input->post('nama_nasabah');
		$alamat 		= $this->input->post('alamat');
		$provinsi 		= $this->input->post('provinsi');
		$kabupaten 		= $this->input->post('kabupaten');
        $kecamatan 		= $this->input->post('kecamatan');
        $desa 			= $this->input->post('desa');
        $agunan 		= $this->input->post('agunan');
        $no_tlp 		= $this->input->post('no_tlp');
		$usrinput 		= $this->session->userdata('login_session')['id_user'];
		
		$data=array(
			'no_pmp'=> $pmp,
			'nama_nasabah'=> $nama_nasabah,
			'alamat'=> $alamat,
			'provinsi'=> $provinsi,
			'kabupaten'=> $kabupaten,
            'kecamatan'=> $kecamatan,
            'desa' => $desa,
			'agunan' => $agunan,
			'no_tlp' => $no_tlp,
			'user_id' => $usrinput
		);

		$this->nasabah_model->tambah_data($data, 'nasabah');
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
    	redirect('penagihan/tambah');
	}

	public function proses_tambah_teletagih()
	{
        
		$pmp 			= $this->input->post('no_pmp');
		$nama_nasabah 	= $this->input->post('nama_nasabah');
		$alamat 		= $this->input->post('alamat');
		$provinsi 		= $this->input->post('provinsi');
		$kabupaten 		= $this->input->post('kabupaten');
        $kecamatan 		= $this->input->post('kecamatan');
        $desa 			= $this->input->post('desa');
        $agunan 		= $this->input->post('agunan');
        $no_tlp 		= $this->input->post('no_tlp');
		$usrinput 		= $this->session->userdata('login_session')['id_user'];
		
		$data=array(
			'no_pmp'=> $pmp,
			'nama_nasabah'=> $nama_nasabah,
			'alamat'=> $alamat,
			'provinsi'=> $provinsi,
			'kabupaten'=> $kabupaten,
            'kecamatan'=> $kecamatan,
            'desa' => $desa,
			'agunan' => $agunan,
			'no_tlp' => $no_tlp,
			'user_id' => $usrinput
		);

		$this->nasabah_model->tambah_data($data, 'nasabah');
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
    	redirect('teletagih/tambah');
	}

	public function proses_ubah()
	{
        $this->load->library('upload', $config);
        
		$id_nasabah 	= $this->input->post('id_nasabah');
		$pmp 			= $this->input->post('no_pmp');
		$nama_nasabah 	= $this->input->post('nama_nasabah');
		$alamat 		= $this->input->post('alamat');
		$kabupaten 		= $this->input->post('kabupaten');
        $kecamatan 		= $this->input->post('kecamatan');
        $desa 			= $this->input->post('desa');
        $agunan 		= $this->input->post('agunan');
		
		$data=array(
			'id_nasabah'=> $id_nasabah,
			'nama_nasabah'=> $nama_nasabah,
			'alamat'=> $alamat,
			'kabupaten'=> $kabupaten,
            'kecamatan'=> $kecamatan,
            'desa' => $desa,
			'agunan' => $agunan
		);

		$where = array(
			'id_nasabah'=>$id_nasabah
		);

		$this->nasabah_model->ubah_data($where, $data, 'nasabah');
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
    	redirect('nasabah');
	}

	public function proses_hapus($id)
	{
		$where = array('id_nasabah' => $id );
		
		$this->nasabah_model->hapus_data($where, 'nasabah');
	

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
		redirect('nasabah');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_nasabah' => $id );
    	$data = $this->nasabah_model->detail_data($where, 'nasabah')->result();
    	echo json_encode($data);
	}

}
