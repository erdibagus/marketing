<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h5 mb-0 text-center text-uppercase font-weigh-fold text-gray-800">Data Pengguna</h1>
    </div>
    <?php if($this->session->userdata('login_session')['level'] == 'superadmin'): ?>
    <a href="<?= base_url() ?>user/tambah" class="col-lg btn btn-sm btn-primary btn-icon-split">
        <span class="text text-white">Tambah Data</span>
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
    </a>
    <?php endif; ?>

    <div class="mb-4">
    <?php if($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'superadmin'): ?>
    <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>KPK</th>
                                <th>Level</th>
                                <?php if($this->session->userdata('login_session')['level'] == 'superadmin'): ?>
                                <th width="1%">Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody style="cursor:pointer;" id="tbody"> 
                            <?php $no=1; foreach ($user as $u): ?>
                            <tr>
                                <td onclick="detail('<?= $u->id_user ?>')"><?= $no++ ?>.</td>
                                <td onclick="detail('<?= $u->id_user ?>')"><img style="border-radius: 5px;" src="assets/upload/pengguna/<?= $u->foto ?>" alt=""
                                        width="50px"></td>
                                <td onclick="detail('<?= $u->id_user ?>')"><?= $u->nama ?></td>
                                <td onclick="detail('<?= $u->id_user ?>')"><?= $u->nama_divisi ?></td>
                                <td onclick="detail('<?= $u->id_user ?>')"><?= $u->nama_kantor ?></td>
                                <td onclick="detail('<?= $u->id_user ?>')"><?php if($u->level == 'admin'): ?>
                                    Manajer Pusat
                                    <?php elseif($u->level == 'manajer'): ?>
                                    Manajer KPK
                                    <?php elseif($u->level == 'user'): ?>
                                    User
                                    <?php else: ?>
                                    Superadmin
                                    <?php endif; ?></td>
                                <?php if($this->session->userdata('login_session')['level'] == 'superadmin'): ?>
                                <td>
                                    <center>
                                        <a href="<?= base_url() ?>user/ubah/<?= $u->id_user ?>"
                                            class="btn btn-circle btn-success btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="#" onclick="konfirmasi('<?= $u->id_user ?>')"
                                            class="btn btn-circle btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </center>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    <?php endif; ?>
    
    <?php if($this->session->userdata('login_session')['level'] == 'manajer' ): ?>
    <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                            </tr>
                        </thead>
                        <tbody style="cursor:pointer;" id="tbody"> 
                            <?php $no=1; foreach ($usermanajer as $u): ?>
                            <tr>
                                <td onclick="detail('<?= $u->id_user ?>')"><?= $no++ ?>.</td>
                                <td onclick="detail('<?= $u->id_user ?>')"><img style="border-radius: 5px;" src="assets/upload/pengguna/<?= $u->foto ?>" alt=""
                                                                        width="45px" class="img-thumbnail rounded-circle"></td>
                                <td onclick="detail('<?= $u->id_user ?>')"><?= $u->nama ?></td>
                                <td onclick="detail('<?= $u->id_user ?>')"><?= $u->nama_divisi ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    <?php endif; ?>

    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pengguna.js"></script>
<?php if($this->session->flashdata('Pesan')): ?>
<?= $this->session->flashdata('Pesan') ?>
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