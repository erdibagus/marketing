<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h5 mb-0 font-weight-bold text-center text-uppercase text-gray-800">Grafik Bulanan</h1>
    </div>

    <div class="row">
        <!-- Area Chart -->

        <div class="col-lg-3 mb-3">
            <label>Tahun</label>
            <div class="input-group">
                <select name="tahun" id="tahun" class="form-control" onchange="filterTahun()">
                    <option value="<?= $yearnow ?>"><?= $yearnow ?></option>
                    <option value="<?= $previousyear ?>"><?= $previousyear ?></option>
                    <option value="<?= $twoyearago ?>"><?= $twoyearago ?></option>
                </select>
                <div class="input-group-append">
                    <div class="btn btn-secondary" id="date1">
                        <i class="fas fa-calendar fa-sm"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 mb-3">        
            <div class="form-group"><label>Marketing</label>
                <select name="user" id="user" class="form-control" onchange="filterTahun()">
                    <option value="">--Pilih--</option>
                    <?php foreach($user as $j): ?>
                    <option value="<?= $j->id_user ?>"><?= $j->nama ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            
        </div>
        
        <div class="col-lg-3 mb-3">              
            <div class="form-group"><label>KPK</label>
                <select name="kpk" id="kpk" class="form-control" onchange="filterTahun()">
                    <option value="">--Pilih--</option>
                    <?php foreach($kpk as $j): ?>
                    <option value="<?= $j->id_kantor ?>"><?= $j->nama_kantor ?></option>
                    <?php endforeach ?>
                </select>
            </div>             
        </div>
        <div class="col-lg mb-3">
            <a href="#" class="btn btn-md bg-gradient-danger text-white btn-icon-split mb-4" onclick="reset() || filterTahun()">
                <span class="text text-white">Reset</span>
                <span class="icon text-white-50">
                    <i class="fas fa-undo"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="card shadow mb-5" id="grafik">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-secondary">
            <h6 class="m-0 font-weight-bold border-0 text-white">Data Bulanan</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area" id="chart">
                <canvas id="myAreaChart"></canvas>
            </div>
        </div>
    </div>

<hr>
<hr>
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h5 mb-0 font-weight-bold text-center text-uppercase text-gray-800">Grafik Tahunan</h1>
    </div>
    <div class="row">

        <!-- Pie Chart -->
        <div class="col-12">
            <div class="row">
                    <div class="col-lg-3 mb-3">
                        <label>Tahun</label>
                        <div class="input-group">
                            <select name="tahunpie" id="tahunpie" class="form-control" onchange="filterTahunPie()">
                                <option value="<?= $yearnow ?>"><?= $yearnow ?></option>
                                <option value="<?= $previousyear ?>"><?= $previousyear ?></option>
                                <option value="<?= $twoyearago ?>"><?= $twoyearago ?></option>
                            </select>
                            <div class="input-group-append">
                                <div class="btn btn-secondary" id="date1">
                                    <i class="fas fa-calendar fa-sm"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 mb-3">        
                        <div class="form-group"><label>Marketing</label>
                            <select name="userpie" id="userpie" class="form-control" onchange="filterTahunPie()">
                                <option value="">--Pilih--</option>
                                <?php foreach($user as $j): ?>
                                <option value="<?= $j->id_user ?>"><?= $j->nama ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        
                    </div>
                    
                    <div class="col-lg-3 mb-3">              
                        <div class="form-group"><label>KPK</label>
                            <select name="kpkpie" id="kpkpie" class="form-control" onchange="filterTahunPie()">
                                <option value="">--Pilih--</option>
                                <?php foreach($kpk as $j): ?>
                                <option value="<?= $j->id_kantor ?>"><?= $j->nama_kantor ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>             
                    </div>
                    <div class="col-lg mb-3">
                        <a href="#" class="btn btn-md bg-gradient-danger text-white btn-icon-split mb-4" onclick="resetPie() || filterTahunPie()">
                            <span class="text text-white">Reset</span>
                            <span class="icon text-white-50">
                                <i class="fas fa-undo"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="card shadow mb-4" id="grafikpie">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-secondary">
                        <h6 class="m-0 font-weight-bold border-0 text-white">Data Tahunan</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area" id="chartpie">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <span class="badge badge-success" id="pr"></span> Prospek
                            </span>
                            <span class="mr-2">
                                <span class="badge badge-danger" id="su"></span> Survey
                            </span>
                            <span class="mr-2">
                                <span class="badge badge-info" id="pe"></span> Penagihan
                            </span>
                            <span class="mr-2">
                                <span class="badge badge-warning" id="tm"></span> Telemarketing
                            </span>
                            <span class="mr-2">
                                <span class="badge badge-primary" id="tt"></span> Teletagih
                            </span>
                        </div>
                    </div>
                </div>
            </div>
    </div>


<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/sbadmin/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/js/chart/chart-area.js"></script>
<script src="<?= base_url(); ?>assets/js/chart/pie-chart.js"></script>

<script src="<?= base_url(); ?>assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dashboard.js"></script>

<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>

<?php if($this->session->flashdata('Pesan')): ?>

<?php else: ?>

<script>
$('.chosen').chosen({
    width: '100%',

});
</script>
<script>
$(document).ready(function() {
    let timerInterval
    Swal.fire({
        title: 'Memuat',
        timer: 300,
        onBeforeOpen: () => {
            Swal.showLoading()
        },
        onClose: () => {
            clearInterval(timerInterval)
        }
    // }).then((result) => {
    //     $("#barang").addClass("bounceIn");
    //     $("#supplier").addClass("bounceIn");
    //     $("#kpk").addClass("bounceIn");
    //     $("#user").addClass("bounceIn");
    //     $("#grafik").addClass("bounceIn");
    //     $("#grafikpie").addClass("bounceIn");
    //     $("#dprterakhir").addClass("bounceIn");
    //     $("#dsuterakhir").addClass("bounceIn");
    //     $("#dpeterakhir").addClass("bounceIn");
    //     $("#dtmterakhir").addClass("bounceIn");
    //     $("#dttterakhir").addClass("bounceIn");
    })
});
</script>
<?php endif; ?>