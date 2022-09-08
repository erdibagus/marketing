<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->library('pagination');
        $this->load->helper('cookie');
        $this->load->model('prospek_model');
        $this->load->model('survey_model');

      }

    public function prospek_pdf()
    {
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $user = $this->input->post('user');
      $kantor = $this->input->post('kantor');

      if($tglawal != '' && $tglakhir != '' && $user != '' && $kantor != ''){
        $data['data'] = $this->prospek_model->lapdatatgluserkantor($tglawal, $tglakhir, $user, $kantor)->result();
      }
      else if($tglawal != '' && $tglakhir != '' && $user != ''){
        $data['data'] = $this->prospek_model->lapdatatgluser($tglawal, $tglakhir, $user)->result();
      }
      else if($tglawal != '' && $tglakhir != '' && $kantor != ''){
        $data['data'] = $this->prospek_model->lapdatatglkantor($tglawal, $tglakhir, $kantor)->result();
      }
      else if($tglawal != '' && $tglakhir != ''){
        $data['data'] = $this->prospek_model->lapdatatgl($tglawal, $tglakhir)->result();
      }
      else{
        $data['data'] = $this->prospek_model->dataJoin()->result();
      }

      $data['tglawal'] = $tglawal;
      $data['tglakhir'] = $tglakhir;

      $data['judul'] = 'Laporan Prospek';
      $mpdf = new \Mpdf\Mpdf();
      $html = $this->load->view('laporan/prospek_pdf',$data,true);
      $mpdf->WriteHTML($html);
      $tgl = date('Ymd_his');
      $namaFile = 'Prospek_'.$tgl.'.pdf';
      $mpdf->Output($namaFile, 'D');

    }

    public function prospek_pdf_manajer()
    {
      $tglawal = $this->input->post('tglawalmanajer');
      $tglakhir = $this->input->post('tglakhirmanajer');
      $user = $this->input->post('usermanajer');

      if($tglawal != '' && $tglakhir != '' && $user != ''){
        $data['data'] = $this->prospek_model->lapdatatgluser($tglawal, $tglakhir, $user)->result();
      }
      else if($tglawal != '' && $tglakhir != ''){
        $data['data'] = $this->prospek_model->lapdatatglmanajer($tglawal, $tglakhir)->result();
      }
      else{
        $data['data'] = $this->prospek_model->dataJoin()->result();
      }

      $data['tglawal'] = $tglawal;
      $data['tglakhir'] = $tglakhir;

      $data['judul'] = 'Laporan Prospek';
      $mpdf = new \Mpdf\Mpdf();
      $html = $this->load->view('laporan/prospek_pdf',$data,true);
      $mpdf->WriteHTML($html);
      $tgl = date('Ymd_his');
      $namaFile = 'Prospek_'.$tgl.'.pdf';
      $mpdf->Output($namaFile, 'D');

    }

    public function survey_pdf()
    {
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $user = $this->input->post('user');
      $kantor = $this->input->post('kantor');

      if($tglawal != '' && $tglakhir != '' && $user != '' && $kantor != ''){
        $data['data'] = $this->survey_model->lapdatatgluserkantor($tglawal, $tglakhir, $user, $kantor)->result();
      }
      else if($tglawal != '' && $tglakhir != '' && $user != ''){
        $data['data'] = $this->survey_model->lapdatatgluser($tglawal, $tglakhir, $user)->result();
      }
      else if($tglawal != '' && $tglakhir != '' && $kantor != ''){
        $data['data'] = $this->survey_model->lapdatatglkantor($tglawal, $tglakhir, $kantor)->result();
      }
      else if($tglawal != '' && $tglakhir != ''){
        $data['data'] = $this->survey_model->lapdatatgl($tglawal, $tglakhir)->result();
      }
      else{
        $data['data'] = $this->survey_model->dataJoin()->result();
      }

      $data['tglawal'] = $tglawal;
      $data['tglakhir'] = $tglakhir;

      $data['judul'] = 'Laporan survey';
      $mpdf = new \Mpdf\Mpdf();
      $html = $this->load->view('laporan/survey_pdf',$data,true);
      $mpdf->WriteHTML($html);
      $tgl = date('Ymd_his');
      $namaFile = 'survey_'.$tgl.'.pdf';
      $mpdf->Output($namaFile, 'D');

    }

    public function survey_pdf_manajer()
    {
      $tglawal = $this->input->post('tglawalmanajer');
      $tglakhir = $this->input->post('tglakhirmanajer');
      $user = $this->input->post('usermanajer');

      if($tglawal != '' && $tglakhir != '' && $user != ''){
        $data['data'] = $this->survey_model->lapdatatgluser($tglawal, $tglakhir, $user)->result();
      }
      else if($tglawal != '' && $tglakhir != ''){
        $data['data'] = $this->survey_model->lapdatatglmanajer($tglawal, $tglakhir)->result();
      }
      else{
        $data['data'] = $this->survey_model->dataJoin()->result();
      }

      $data['tglawal'] = $tglawal;
      $data['tglakhir'] = $tglakhir;

      $data['judul'] = 'Laporan survey';
      $mpdf = new \Mpdf\Mpdf();
      $html = $this->load->view('laporan/survey_pdf',$data,true);
      $mpdf->WriteHTML($html);
      $tgl = date('Ymd_his');
      $namaFile = 'survey_'.$tgl.'.pdf';
      $mpdf->Output($namaFile, 'D');

    }
}