<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5 tembus">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                        <div class="text-center">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <h1 class="h1 text-white mb-4"><b>SEKARTAMA</b></h1>
                        </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <center>
                                    <img width="110px" src="<?= base_url() ?>assets/icon/logoputih.png">
                                </center>
                                <br>
                                <div class="text-center">
                                    <div class="judul">
                                    <hr class="bg-white">
                                    <div class="text-center">
                                        <h1 class="h1 text-white mb-7"><b>APLIKASI</b></h1>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h2 text-white mb-7">MARKETING</h2>
                                    </div>
                                    <hr class="bg-white">
                                </div>
                                </div>
                                <br>
                                <form class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            id="user" name="user" aria-describedby="usernameHelp"
                                            placeholder="Username" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="pwd" name="pwd" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        
                                        <br>
                                    </div>
                                    <a href="#" onclick="proses_login()" id="login"
                                        class="btn text-white bg-gradient-info btn-user btn-block shadow">
                                        Login
                                    </a> 
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/login.js"></script>
<?php if($this->session->flashdata('Pesan')): ?>
<?= $this->session->flashdata('Pesan'); ?>
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
    }).then((result) => {
        
    })
});
</script>

<?php endif; ?>