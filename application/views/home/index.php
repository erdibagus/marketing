<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h5 mb-0 font-weight-bold text-center text-uppercase text-gray-800">Dashboard</h1>
    </div>
    
    <div id="carouselExampleFade" class="carousel slide carousel-fade mb-3" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url(); ?>assets/brosur/multiguna.jpg" class="d-block w-100 mb-3" alt="...">

            </div>
            <div class="carousel-item">
                <img src="<?= base_url(); ?>assets/brosur/haji.jpg" class="d-block w-100 mb-3" alt="...">

            </div>
            <div class="carousel-item">
                <img src="<?= base_url(); ?>assets/brosur/pasti_bisa.jpg" class="d-block w-100  mb-3" alt="...">

            </div>
            <div class="carousel-item">
                <img src="<?= base_url(); ?>assets/brosur/perkasa.jpg" class="d-block w-100  mb-3" alt="...">

            </div>
        </div>
    
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div id="container">
    <div class="card border-bottom-dark shadow h-100 py-2">
        <div class="card-body">
            <h1 class="h5 font-weight-bold text-dark text-uppercase">Pengumuman!</h1>
            <h1 class="h5 text-dark">- Sebelum input data, pastikan GPS sudah aktif. Terimakasih</h1>
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

<?php if($this->session->flashdata('Pesan')): ?>

<?php else: ?>
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