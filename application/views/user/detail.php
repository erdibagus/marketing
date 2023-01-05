<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <div class="d-sm-flex">
            <h1 class="h5 mb-0 text-center text-uppercase font-weight-bold text-gray-800">Detail Pengguna</h1>
        </div>
        <!-- 
            <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Simpan Data</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>
            -->
    </div>

    <?php foreach ($data as $d): ?>

    <div class="d-sm-flex  justify-content-between mb-0">
        <div class="mb-4">
            <!-- buku -->
            <div class="card shadow mb-4">
                <div class="card-body d-sm-flex">
                    <div class="col-lg-3">
                        <center><img width="50%" style="border-radius: 10px;"
                            src="<?= base_url() ?>assets/upload/pengguna/<?= $d->foto ?>" alt=""></center>
                    </div>

                    <br>

                    <div class="col-lg-9">
                        <!-- ID Anggota -->
                        <div class="form-group"><label>ID Pengguna</label>
                            <h4 class="h6 text-gray-800"><b><?= $d->id_user ?></b></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                         <!-- Nama Lengkap -->
                         <div class="form-group"><label>Nama Lengkap</label>
                            <h4 class="h6 text-gray-800"><?= $d->nama ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Username -->
                        <div class="form-group"><label>Username</label>
                            <h4 class="h6 text-gray-800"><?= $d->username ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Divisi -->
                        <div class="form-group"><label>Divisi</label>
                            <h4 class="h6 text-gray-800"><?= $d->nama_divisi ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Kantor -->
                        <div class="form-group"><label>Kantor</label>
                            <h4 class="h6 text-gray-800"><?= $d->nama_kantor ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Level -->
                        <div class="form-group"><label>Level</label>
                            <?php if($d->level == "admin"): ?>
                            <h6>Manajer Pusat</h6>
                            <?php elseif($d->level == "manajer"): ?>
                            <h6>Manajer KPK</h6>
                            <?php elseif($d->level == "user"): ?>
                            <h6>User</h6>
                            <?php else: ?>
                            <h6>SuperAdmin</h6>
                            <?php endif; ?>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Status -->
                        <div class="form-group"><label>Status</label>
                            <?php if($d->status == "Aktif"): ?>
                            <h4 class="h4 text-success">
                            <?php else: ?>
                            <h4 class="h4 text-gray-800">
                            <?php endif; ?>
                            <?= $d->status ?>
                            </h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                    </div>

                </div>
            </div>

        </div>

        <?php endforeach; ?>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pengguna.js"></script>

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
    }).then((result) => {

    })
});
</script>
<?php endif; ?>