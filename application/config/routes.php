<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home/index';

$route['home'] = 'Home/index';
$route['profile'] = 'Profile/index';

//user & login
$route['user'] = 'User/index';
$route['login'] = 'Login/index';

//master kegiatan
$route['kategori'] = 'Kategori/index';
$route['agunan'] = 'Agunan/index';
$route['sistem_pinjam'] = 'Sistem_pinjam/index';
$route['kolektabilitas'] = 'Kolektabilitas/index';
$route['sumber'] = 'Sumber/index';
$route['divisi'] = 'Divisi/index';
$route['kantor'] = 'Kantor/index';
$route['nasabah'] = 'Nasabah/index';
$route['nasabah_prospek'] = 'Nasabah_prospek/index';
$route['prospek'] = 'Prospek/index';
$route['survey'] = 'Survey/index';
$route['penagihan'] = 'Penagihan/index';
$route['telemarketing'] = 'Telemarketing/index';
$route['teletagih'] = 'Teletagih/index';
$route['kegiatan'] = 'Kegiatan/index';
$route['scoring'] = 'Scoring/index';

//master scoring
$route['masterscoring/jenis_kelamin'] = 'Masterscoring/jenis_kelamin/index';
$route['masterscoring/usia'] = 'Masterscoring/usia/index';
$route['masterscoring/tanggungan'] = 'Masterscoring/tanggungan/index';
$route['masterscoring/lama_tinggal'] = 'Masterscoring/lama_tinggal/index';
$route['masterscoring/lokasi_tinggal'] = 'Masterscoring/lokasi_tinggal/index';
$route['masterscoring/memiliki_kendaraan'] = 'Masterscoring/memiliki_kendaraan/index';
$route['masterscoring/kepemilikan_kendaraan'] = 'Masterscoring/kepemilikan_kendaraan/index';
$route['masterscoring/jenis_kendaraan'] = 'Masterscoring/jenis_kendaraan/index';
$route['masterscoring/bentuk_perusahaan'] = 'Masterscoring/bentuk_perusahaan/index';
$route['masterscoring/lokasi_perusahaan'] = 'Masterscoring/lokasi_perusahaan/index';
$route['masterscoring/masa_kerja'] = 'Masterscoring/masa_kerja/index';
$route['masterscoring/bidang_usaha'] = 'Masterscoring/bidang_usaha/index';
$route['masterscoring/bagian'] = 'Masterscoring/bagian/index';
$route['masterscoring/gaji'] = 'Masterscoring/gaji/index';
$route['masterscoring/besar_pinjam'] = 'Masterscoring/besar_pinjam/index';
$route['masterscoring/tenor_pinjam'] = 'Masterscoring/tenor_pinjam/index';
$route['masterscoring/tujuan_pinjam'] = 'Masterscoring/tujuan_pinjam/index';
$route['masterscoring/installment_ratio'] = 'Masterscoring/installment_ratio/index';
$route['masterscoring/colateral_ratio'] = 'Masterscoring/colateral_ratio/index';

//storting
$route['storting'] = 'storting/index';
$route['import'] = 'storting/import';
$route['cek_storting'] = 'storting/cek_storting';

//laporan
$route['lap_prospek'] = 'prospek/laporan';
$route['lap_survey'] = 'survey/laporan';
$route['lap_penagihan'] = 'penagihan/laporan';
$route['lap_telemarketing'] = 'telemarketing/laporan';
$route['lap_teletagih'] = 'teletagih/laporan';
$route['grafik'] = 'home/grafik';
$route['grafikmanajer'] = 'home/grafikmanajer';



$route['(:any)'] = 'gagal/index/$1';
$route['404_override'] = 'Gagal/index';
$route['translate_uri_dashes'] = FALSE;