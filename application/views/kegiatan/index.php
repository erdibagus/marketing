
<!-- End of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h5 mb-0 font-weight-bold text-uppercase text-center text-gray-800">Kegiatan</h1>
    </div>
    <?php if($this->session->userdata('login_session')['level'] == 'user'): ?>
    <div class="row">
        
         <!-- Earnings (Monthly) Card Example -->
        <a href="<?= base_url() ?>prospek" class="col-xl-4 col-4 col-md-6 mb-4" id="prospek">
            <div class="card border-left-primary shadow">
                <div class="card-body">
                    <div class="text-center">
                    <i class="fas fa-bullhorn text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="text-gray-900 text-center mb-1 mt-2">Prospek
            </div>
        </a>
        
        <?php if($this->session->userdata('login_session')['divisi_id'] == '2'): ?>
        <!-- Earnings (Monthly) Card Example -->
        <a href="<?= base_url() ?>survey" class="col-xl-4 col-4 col-md-6 mb-4" id="survey">
            <div class="card border-left-info shadow">
                <div class="card-body">
                    <div class="text-center">
                    <i class="fas fa-balance-scale-left text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="text-gray-900 text-center mb-1 mt-2">Survey
            </div>
        </a>
        
        
        <!-- Earnings (Monthly) Card Example -->
        <a href="<?= base_url() ?>penagihan" class="col-xl-4 col-4 col-md-6 mb-4" id="penagihan">
            <div class="card border-left-warning shadow">
                <div class="card-body">
                    <div class="text-center">
                    <i class="fas fa-cash-register text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="text-gray-900 text-center mb-1 mt-2">Penagihan
            </div>
        </a>
        
        <?php endif; ?>
        <!-- Earnings (Monthly) Card Example -->
        <a href="<?= base_url() ?>telemarketing" class="col-xl-4 col-4 col-md-6 mb-4" id="telemarketing">
            <div class="card border-left-secondary shadow">
                <div class="card-body">
                    <div class="text-center">
                    <i class="fas fa-headphones text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="text-gray-900 text-center mb-1 mt-2">Teleprospek
            </div>
        </a>
        

        <a href="<?= base_url() ?>teletagih" class="col-xl-4 col-4 col-md-6" id="teletagih">
            <div class="card border-left-danger shadow">
                <div class="card-body">               
                    <div class="text-center">
                        <i class="fas fa-tty text-gray-300"></i>
                    </div> 
                </div>
            </div>
            <div class="text-gray-900 text-center mb-1 mt-2">Teletagih
            </div>
        </a>
        
    </div>
    <?php else: ?>
    <div class="row">
         <!-- Earnings (Monthly) Card Example -->
        <a href="<?= base_url() ?>prospek" class="col-xl-4 col-4 col-md-6 mb-4" id="prospek">
            <div class="card border-left-primary shadow">
                <div class="card-body">
                    <div class="text-center">
                    <i class="fas fa-bullhorn text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="text-gray-900 text-center mb-1 mt-2">Prospek
            </div>
        </a>
        
        <!-- Earnings (Monthly) Card Example -->
        <a href="<?= base_url() ?>survey" class="col-xl-4 col-4 col-md-6 mb-4" id="survey">
            <div class="card border-left-info shadow">
                <div class="card-body">
                    <div class="text-center">
                    <i class="fas fa-balance-scale-left text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="text-gray-900 text-center mb-1 mt-2">Survey
            </div>
        </a>

        <!-- Earnings (Monthly) Card Example -->
        <a href="<?= base_url() ?>penagihan" class="col-xl-4 col-4 col-md-6 mb-4" id="penagihan">
            <div class="card border-left-warning shadow">
                <div class="card-body">
                    <div class="text-center">
                    <i class="fas fa-cash-register text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="text-gray-900 text-center mb-1 mt-2">Penagihan
            </div>
        </a>
        <!-- Earnings (Monthly) Card Example -->
        <a href="<?= base_url() ?>telemarketing" class="col-xl-4 col-4 col-md-6 mb-4" id="telemarketing">
            <div class="card border-left-secondary shadow">
                <div class="card-body">
                    <div class="text-center">
                    <i class="fas fa-headphones text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="text-gray-900 text-center mb-1 mt-2">Teleprospek
            </div>
        </a>

        <a href="<?= base_url() ?>teletagih" class="col-xl-4 col-4 col-md-6" id="teletagih">
            <div class="card border-left-danger shadow">
                <div class="card-body">               
                    <div class="text-center">
                        <i class="fas fa-tty text-gray-300"></i>
                    </div> 
                </div>
            </div>
            <div class="text-gray-900 text-center mb-1 mt-2">Teletagih
            </div>
        </a>
    </div>
    <?php endif; ?>
</div>

<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/sbadmin/vendor/chart.js/Chart.min.js"></script>

<script src="<?= base_url(); ?>assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dashboard.js"></script>

<?php if($this->session->flashdata('Pesan')): ?>

<?php else: ?>
<script>
$(document).ready(function() {
    let timerInterval
    Swal.fire({
        title: 'Memuat...',
        timer: 300,
        onBeforeOpen: () => {
            Swal.showLoading()
        },
        onClose: () => {
            clearInterval(timerInterval)
        }
    // }).then((result) => {
    //     $("#prospek").addClass("bounceOut");
    //     $("#survey").addClass("bounceOut");
    //     $("#penagihan").addClass("bounceOut");
    //     $("#telemarketing").addClass("bounceOut");
    //     $("#teletagih").addClass("bounceOut");
    })
});
</script>
<?php endif; ?>