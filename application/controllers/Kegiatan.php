<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {
	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->helper('cookie');
  }
	
	public function index()
	{
		$data['title'] = 'Kegiatan';

		$this->load->view('templates/header', $data);
		$this->load->view('kegiatan/index');
		$this->load->view('templates/footer');

	}
}
