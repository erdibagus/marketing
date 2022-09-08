<?php 

if (!$this->session->has_userdata('login_session')) {
    redirect('login');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/icon/logoaja.png">

    <title>MARKETING | <?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link href="<?= base_url(); ?>assets/css/fonts.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/sbadmin/css/sb-admin-biru.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/profileee.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/all.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/animate/animate.min.css" rel="stylesheet">
    <!-- Select Chosen -->
    <link href="<?= base_url(); ?>assets/plugin/datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <!-- Select Chosen -->
    <link href="<?= base_url(); ?>assets/plugin/chosen/dist/css/component-chosen.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="<?= base_url(); ?>assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugin/mapbox/mapbox-gl.js"></script>
    <link href="<?= base_url(); ?>assets/plugin/mapbox/mapbox-gl.css" rel='stylesheet' />
</head>

<body id="page-top">

<style>
.ggs{
border-width: 5px;
border-style: ridge;
border-color: grey;
}
</style>

<style>
#mapid{
	width: 600px;
	height: 400px;
}
</style>
<style>
    .bg-navbar-image {
        background-image: url("<?= base_url('assets/img/topbar.png'); ?>");
        background-repeat: no-repeat;
        background-size: 150%;
    }
</style>


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav d-none d-md-inline bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon ">
                    <img src="<?= base_url(); ?>assets/icon/logoputih.png" width="50">
                </div>
                <div class="sidebar-brand-text mx-3 ">Marketing & Operasional</div>
                
            </div>

            <!-- Nav Item - Dashboard -->
            <?php if($title == 'Dashboard'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url(); ?>home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <?php if($this->session->userdata('login_session')['level'] == 'superadmin'): ?>
             <!-- Divider -->
            <hr class="sidebar-divider">
            
            <!-- Heading -->
            <div class="sidebar-heading">
                Data Master
            </div>

            <?php if($title == 'Divisi'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url() ?>divisi">
                    <i class="fas fa-fw fa-store"></i>
                    <span>Divisi</span>
                </a>
            </li>

            <?php if($title == 'Kantor'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url() ?>kantor">
                    <i class="fas fa-fw fa-city"></i>
                    <span>Kantor</span>
                </a>
            </li>
            <?php if($title == 'Nasabah'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url() ?>nasabah">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>Nasabah</span>
                </a>
            </li>
            </li>

            <?php if($title == 'Nasabah Prospek'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url() ?>nasabah_prospek">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>Nasabah Prospek</span>
                </a>
            </li>
            </li>

            <?php if($title == 'Kolektabilitas' or $title == 'Kategori' or $title == 'Agunan' or $title == 'Sistem Pinjam' or $title == 'Sumber'): ?>
            <li class="nav-item active">
            <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Master Data</h6>
                        <a class="collapse-item" href="<?= base_url() ?>kategori"><b>Kategori</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>kolektabilitas"><b>Kolektabilitas</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>agunan"><b>Agunan</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>sistem_pinjam"><b>Sistem Pinjam</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>sumber"><b>Sumber</b></a>
                    </div>

                </div>
            </li>
            <?php endif; ?>
            <!-- Divider -->
            <hr class="sidebar-divider">
    
            <!-- Heading -->
            <div class="sidebar-heading">
                Kegiatan
            </div>
             <!-- Nav Item - Pages Collapse Menu -->
            <?php if($title == 'Kegiatan'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url() ?>kegiatan">
                    <i class="fas fa-network-wired"></i>
                    <span>Kegiatan</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Master Scoring
            </div>

            <?php if($title == 'Sosial Demografic'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages5" aria-expanded="true"
                    aria-controls="collapsePages5">
                    <i class="fa fa-sign-language" aria-hidden="true"></i>
                    <span>Sosial Demografic</span>
                </a>
                <div id="collapsePages5" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Peminjam</h6>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/jenis_kelamin"><b>Jenis Kelmain</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/usia"><b>Usia</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/status_pernikahan"><b>Status Pernikahan</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/tanggungan"><b>Tanggungan</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/lama_tinggal"><b>Lama Tinggal</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/lokasi_tinggal"><b>Lokasi Tinggal</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/jenis_tinggal"><b>Jenis Tinggal</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/memiliki_kendaraan"><b>Memiliki Kendaraan</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/kepemilikan_kendaraan"><b>Kepemilikan Kendaraan</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/jenis_kendaraan"><b>Jenis Kendaraan</b></a>
                    </div>

                </div>
            </li>

            <?php if($title == 'Pekerjaan'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages6" aria-expanded="true"
                    aria-controls="collapsePages6">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                    <span>Pekerjaan</span>
                </a>
                <div id="collapsePages6" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Peminjam</h6>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/bentuk_perusahaan"><b>Bentuk Perusahaan</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/lokasi_perusahaan"><b>Lokasi Perusahaan</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/masa_kerja"><b>Masa Kerja</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/bidang_usaha"><b>Bidang Usaha</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/bagian"><b>Bagian</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/gaji"><b>Gaji</b></a>
                    </div>

                </div>
            </li>

            <?php if($title == 'Credit Application'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages7" aria-expanded="true"
                    aria-controls="collapsePages7">
                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                    <span>Credit Application</span>
                </a>
                <div id="collapsePages7" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/besar_pinjam"><b>Besar Pinjaman</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/tenor_pinjam"><b>Tenor Pinjaman</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/tujuan_pinjam"><b>Tujuan Pinjaman</b></a>
                    </div>

                </div>
            </li>

            <?php if($title == 'Financial'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages8" aria-expanded="true"
                    aria-controls="collapsePages8">
                    <i class="fa fa-cogs" aria-hidden="true"></i>>
                    <span>Financial</span>
                </a>
                <div id="collapsePages8" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Peminjam</h6>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/installment_ratio"><b>Installment Ratio</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>masterscoring/colateral_ratio"><b>Colateral Ratio</b></a>
                    </div>

                </div>
            </li>
            <hr class="sidebar-divider"> -->
            
            <?php if($this->session->userdata('login_session')['level'] == 'superadmin'): ?>

            <div class="sidebar-heading">
                Data Scoring
            </div>
            <?php if($title == 'Data Scoring'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url() ?>scoring">
                    <i class="fas fa-network-wired"></i>
                    <span>Scoring</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <?php endif; ?>
        
            <div class="sidebar-heading">
                Data Storting
            </div>

            <?php if($this->session->userdata('login_session')['level'] == 'superadmin' || $this->session->userdata('login_session')['level'] == 'admin'): ?>
            <?php if($title == 'Import'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url() ?>import">
                    <i class="fas fa-fw fa-upload"></i>
                    <span>Import</span>
                </a>
            </li>

            <?php if($title == 'Cek Storting'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url() ?>cek_storting">
                    <i class="fas fa-fw fa-check-square"></i>
                    <span>Cek Storting</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if($title == 'Storting'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url() ?>storting">
                    <i class="fas fa-fw fa-paper-plane"></i>
                    <span>Storting</span>
                </a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>
            <?php if($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'superadmin' ): ?>
            <?php if($title == 'Grafik'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url() ?>grafik">
                <i class="fas fa-fw fa fa-bolt"></i>
                    <span>Grafik</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if($this->session->userdata('login_session')['level'] == 'manajer' ): ?>
            <?php if($title == 'Grafik'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url() ?>grafikmanajer">
                <i class="fas fa-fw fa fa-bolt"></i>
                    <span>Grafik</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if($title == 'Laporan Prospek' or $title == 'Laporan Survey' or $title == 'Laporan Penagihan' or $title == 'Laporan Telemarketing'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages4" aria-expanded="true"
                    aria-controls="collapsePages4">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapsePages4" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan</h6>
                        <a class="collapse-item" href="<?= base_url() ?>lap_prospek"><b>Prospek</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>lap_survey"><b>Survey</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>lap_penagihan"><b>Penagihan</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>lap_telemarketing"><b>Telemarketing</b></a>
                        <a class="collapse-item" href="<?= base_url() ?>lap_teletagih"><b>Teletagih</b></a>
                    </div>

                </div>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            

            <?php if($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'manajer' || $this->session->userdata('login_session')['level'] == 'superadmin' ): ?>
            <div class="sidebar-heading">
                Data User
            </div>
            <?php if($title == 'User'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url() ?>user">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data User</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <?php endif; ?>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar-image topbar mb-3 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn d-none d-md-inline btn-success d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Nama Aplikasi  -->
                    <div class="topbar-brand d-lg-none d-flex align-items-center justify-content-center">
                        <div class="sidebar-brand-icon">
                            <img src="<?= base_url(); ?>/assets/icon/logoputih.png" width="40">
                        </div>
                        <div class="topbar-brand-text text-white mx-3">Marketing & Operasional</div>
                    </div>
                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        

                        
                        
                         <!-- Nav Item - User Information -->
                        <li class="nav-item d-none d-md-inline dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="font-weight-bold text-white small" id="namaP"><?= $this->session->userdata('login_session')['nama'] ?></span>
                                <input type="hidden" name="iduser" id="iduser" value="<?= $this->session->userdata('login_session')['id_user'] ?>">
                            </a>
                            <!-- Dropdown - User Information  -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url() ?>profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item logout" href="#" id="logout" onclick="logout()">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                        

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- battombar -->
                <nav class="navbar navbar-dark bg-gradient-danger navbar-expand fixed-bottom d-md-none d-lg-none d-xl-none p-0">
                    <ul class="navbar-nav nav-justified w-100">
                    <?php if($title == 'Dashboard'): ?>
                    <li class="nav-item active">
                        <?php else: ?>
                    <li class="nav-item">
                        <?php endif; ?>
                            <a href="<?= base_url('home'); ?>" class="nav-link text-center">
                                <svg width="16" height="16" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                    <path fill-rule="evenodd"
                                        d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                </svg>
                                <span class="small d-block">Home</span>
                            </a>
                        </li>
                        <?php if($this->session->userdata('login_session')['level'] == 'superadmin'): ?>
                        <?php if($title == 'Divisi' or $title == 'Kantor' or $title == 'Divisi' or $title == 'Nasabah Prospek' or $title == 'Nasabah' or $title == 'Kolektabilitas' or $title == 'Kategori' or $title == 'Agunan' or $title == 'Sistem Pinjam' or $title == 'Sumber'): ?>
                        <li class="nav-item dropup active">
                            <?php else: ?>
                        <li class="nav-item dropup">
                            <?php endif; ?>
                            <a href="#" class="nav-link text-center" role="button" id="dropdownMenuProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-columns" viewBox="0 0 16 16">
                                <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V2zm8.5 0v8H15V2H8.5zm0 9v3H15v-3H8.5zm-1-9H1v3h6.5V2zM1 14h6.5V6H1v8z"/>
                            </svg>
                                <span class="small d-block">Master</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url() ?>divisi">
                                    Divisi
                                </a>
                                <a class="dropdown-item" href="<?= base_url() ?>kantor">
                                    Kantor
                                </a>
                                <a class="dropdown-item" href="<?= base_url() ?>nasabah_prospek">
                                    Nasabah Prospek
                                </a>
                                <a class="dropdown-item" href="<?= base_url() ?>nasabah">
                                    Nasabah
                                </a>
                                <a class="dropdown-item" href="<?= base_url() ?>kategori">
                                    Kategori
                                </a>
                                <a class="dropdown-item" href="<?= base_url() ?>kolektabilitas">
                                    Kolektabilitas
                                </a>
                                <a class="dropdown-item" href="<?= base_url() ?>agunan">
                                    Agunan
                                </a>
                                <a class="dropdown-item" href="<?= base_url() ?>sistem_pinjam">
                                    Sistem Pinjam
                                </a>
                                <a class="dropdown-item" href="<?= base_url() ?>sumber">
                                    Sumber Data
                                </a>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php if($title == 'Kegiatan'): ?>
                        <li class="nav-item active">
                            <?php else: ?>
                        <li class="nav-item">
                            <?php endif; ?>
                            <a href="<?= base_url('kegiatan'); ?>" class="nav-link text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                                </svg>
                                <span class="small d-block">Kegiatan</span>
                            </a>
                        </li>
                        <?php if($this->session->userdata('login_session')['level'] == 'superadmin' || $this->session->userdata('login_session')['level'] == 'manajer' || $this->session->userdata('login_session')['level'] == 'admin'): ?>
                        <?php if($title == 'Laporan Prospek' or $title == 'Laporan Survey' or $title == 'Laporan Penagihan' or $title == 'Laporan Teleprospek' or $title == 'Laporan Teletagih'): ?>
                        <li class="nav-item dropup active">
                            <?php else: ?>
                        <li class="nav-item dropup">
                            <?php endif; ?>
                            <a href="#" class="nav-link text-center" role="button" id="dropdownMenuProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                <svg width="16" height="16" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M2 10h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1zm9-9h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm0 9a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-3zm0-10a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-3zM2 9a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H2zm7 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2v-3zM0 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.354.854a.5.5 0 1 0-.708-.708L3 3.793l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0l2-2z" />
                                </svg>
                                
                                <span class="small d-block">Laporan</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url() ?>lap_prospek">
                                    Prospek
                                </a>
                                <a class="dropdown-item" href="<?= base_url() ?>lap_survey">
                                    Survey
                                </a>
                                <a class="dropdown-item" href="<?= base_url() ?>lap_penagihan">
                                    Penagihan
                                </a>
                                <a class="dropdown-item" href="<?= base_url() ?>lap_telemarketing">
                                    Teleprospek
                                </a>
                                <a class="dropdown-item" href="<?= base_url() ?>lap_teletagih">
                                    Teletagih
                                </a>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php if($this->session->userdata('login_session')['level'] == 'user'): ?>
                        <?php if($title == 'Storting'): ?>
                        <li class="nav-item active">
                            <?php else: ?>
                        <li class="nav-item">
                            <?php endif; ?>
                            <a href="<?= base_url('storting'); ?>" class="nav-link text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                            </svg>
                                <span class="small d-block">Storting</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'manajer' || $this->session->userdata('login_session')['level'] == 'superadmin'): ?>
                        <?php if($title == 'User'): ?>
                        <li class="nav-item active">
                            <?php else: ?>
                        <li class="nav-item">
                            <?php endif; ?>
                            <a href="<?= base_url('user'); ?>" class="nav-link text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                            </svg>
                                <span class="small d-block">User</span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if($title == 'Profile'): ?>
                        <li class="nav-item dropup active">
                            <?php else: ?>
                        <li class="nav-item dropup">
                            <?php endif; ?>
                            <a href="#" class="nav-link text-center" role="button" id="dropdownMenuProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                <svg width="16" height="16" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                </svg>
                                <span class="small d-block">Profil</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-item" href="#">
                                    <strong><?= $this->session->userdata('login_session')['nama'] ?></strong>
                                </div>
                                <a class="dropdown-item" href="<?= base_url() ?>profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item logout" href="#" id="logout" onclick="logout()">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                        
                    </ul>
                </nav>

                <!-- base url untuk js -->
                <input type="hidden" value="<?= base_url() ?>" id="baseurl">