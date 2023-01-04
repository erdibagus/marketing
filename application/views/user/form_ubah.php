<!-- Begin Page Content -->
<div class="container-fluid">

    <?php foreach($user as $u): ?>

    <form action="<?= base_url() ?>user/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateFormUpdate()">


        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <div class="d-sm-flex">
                <h1 class="h5 mb-0 text-center text-uppercase font-weight-bold text-gray-800">Ubah Pengguna</h1>
            </div>

        </div>

        <div class="justify-content-between mb-0">
            <div class="mb-4">
                <!-- form -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Pengguna</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                             <!-- ID User-->
                            <input class="form-control" name="iduser" type="hidden" value="<?= $u->id_user ?>" readonly>
                             <!-- Nama Lengkap -->
                             <div class="form-group"><label>Nama Lengkap</label>
                                <input class="form-control" name="namaL" type="text" value="<?= $u->nama ?>">
                            </div>

                            <!-- Username -->
                            <div class="form-group"><label>Username</label>
                                <input class="form-control" name="user" type="text" value="<?= $u->username ?>">
                            </div>

                            <!-- divisi -->
                            <?php if($jmlDivisi > 0): ?>
                            <div class="form-group"><label>Divisi</label>
                                <select name="divisi" class="form-control chosen">
                                    <?php foreach($divisi as $s): ?>

                                    <?php if($u->divisi_id == $s->id_divisi): ?>
                                    <option value="<?= $s->id_divisi ?>" selected><?= $s->nama_divisi ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->id_divisi ?>"><?= $s->nama_divisi ?></option>
                                    <?php endif; ?>

                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php else: ?>
                            <div class="form-group"><label>Divisi</label>
                                <input type="hidden" name="divisi">
                                <div class="d-sm-flex justify-content-between">
                                    <span class="text-danger"><i>(Belum Ada Data Divisi!)</i></span>
                                    <a href="<?= base_url() ?>divisi" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon text-white">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- kantor -->
                            <?php if($jmlKantor > 0): ?>
                            <div class="form-group"><label>Kantor</label>
                                <select name="kantor" class="form-control chosen">
                                    <?php foreach($kantor as $s): ?>

                                    <?php if($u->kantor_id == $s->id_kantor): ?>
                                    <option value="<?= $s->id_kantor ?>" selected><?= $s->nama_kantor ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->id_kantor ?>"><?= $s->nama_kantor ?></option>
                                    <?php endif; ?>

                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php else: ?>
                            <div class="form-group"><label>kantor</label>
                                <input type="hidden" name="kantor">
                                <div class="d-sm-flex justify-content-between">
                                    <span class="text-danger"><i>(Belum Ada Data Kantor!)</i></span>
                                    <a href="<?= base_url() ?>kantor" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon text-white">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Level -->
                            <div class="form-group"><label>Level</label>
                                <select name="level" class="form-control">
                                        <option value="admin" 
                                    <?php if($u->level == "admin"): ?> Selected <?php endif; ?> >Manajer Pusat</option>
                                        <option value="manager" 
                                    <?php if($u->level == "manager"): ?> Selected <?php endif; ?> >Manager KPK</option>
                                        <option value="user" 
                                    <?php if($u->level == "user"): ?> Selected <?php endif; ?> >User</option>
                                </select>
                            </div>

                             <!-- Status -->
                             <!-- <div class="form-group"><label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="Aktif" 
                                    <?php if($u->status == "Aktif"): ?> Selected <?php endif; ?> >Aktif</option>
                                    <option value="Tidak Aktif" 
                                    <?php if($u->status == "Tidak Aktif"): ?> Selected <?php endif; ?> >Tidak Aktif</option>
                                </select>
                            </div> -->

                            

                        </div>


                        <br>
                    </div>
                </div>

            </div>

            <div class="mb-4">
                <!-- file -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Foto</h6>
                    </div>
                    <div class="card-body">
                        <div class="card bg-warning text-white shadow">
                            <div class="card-body">
                                Format
                                <div class="text-white-45 small">.png .jpeg .jpg .tiff .gif .tif</div>
                            </div>
                        </div>
                        <br>
                        <center>
                            <div>
                                <img src="<?= base_url() ?>assets/upload/pengguna/<?= $u->foto ?>" id="outputImg" width="200"
                                    maxheight="300">
                            </div>
                        </center>
                        <br>
                        <span class="text-danger">*kosongkan jika tidak ingin merubah</span>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="hidden" name="fotoLama" value="<?= $u->foto ?>">
                                <input class="custom-file-input" type="file" id="GetFile" name="photo"
                                    onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Ubah Password</h6>
                    </div>
                    <div class="card-body">

                        <div class="card bg-warning text-white mb-3 shadow">
                            <div class="card-body">
                                Kosongkan jika tidak ingin merubah!
                            </div>
                        </div>
                        
                        <!-- Password lama -->
                        <input name="pwdLama" type="hidden" value="<?= $u->password ?>">

                        <!-- Password -->
                        <div class="form-group"><label>Password</label>
                            <input class="form-control" name="pwd" type="password" value="">
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="form-group"><label>Konfirmasi Password</label>
                            <input class="form-control" name="kpwd" type="password" value="">
                        </div>

                    </div>
                </div>
                    <button type="submit" class="btn btn-success btn-md btn-icon-split">
                        <span class="text text-white">Simpan Perubahan</span>
                            <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                    </button>
            </div>
        </div>


    </form>

</div>
<!-- /.container-fluid -->

<?php endforeach; ?>

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pengguna.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formuser.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>

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
    }).then((result) => {

    })
});
</script>
<?php endif; ?>