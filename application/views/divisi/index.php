<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h4 mb-0 text-center font-weight-bold text-gray-800">Data Divisi</h1>
    </div>

    <div class="mb-4" id="container">

        <!-- Illustrations -->
        <div class="card border-bottom-secondary shadow mb-4">
            <a href="" data-toggle="modal" data-target="#form" class="btn btn-sm btn-primary btn-icon-split">
                <span class="text text-white">Tambah Data</span>
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
            </a>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table " id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Divisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php $no=1; foreach ($divisi as $j) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td>
                                    <?php if($j->nama_divisi == ''): ?>
                                    <i> (Tidak diisi) </i>
                                    <?php else: ?>
                                    <?= $j->nama_divisi ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#formU"
                                        onclick="ambilData('<?= $j->id_divisi ?>')"
                                        class="btn btn-circle btn-success btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="#" onclick="konfirmasi('<?= $j->id_divisi ?>')"
                                        class="btn btn-circle btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- form input -->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?= base_url() ?>divisi/proses_tambah" name="myForm" method="POST" onsubmit="return validateForm()">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Tambah Divisi</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>

                <div class="col-lg-12">
                    <br>
                    <!-- Nama divisi -->
                    <div class="form-group"><label>Nama Divisi</label>
                        <input class="form-control" name="divisi" type="text" placeholder="">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text text-white">Simpan Data</span>
                    </button>
                    <button type="button" class="btn btn-secondary btn-icon-split" data-dismiss="modal">
                        <span class="icon text-white-50">
                            <i class="fas fa-times"></i>
                        </span>
                        <span class="text text-white">Batal</span>
                    </button>

                </div>
            </div>
        </div>
    </form>
</div>

<!-- form ubah -->
<div class="modal fade" id="formU" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?= base_url() ?>divisi/proses_ubah" name="myFormUpdate" method="POST"
        onsubmit="return validateFormUpdate()">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Ubah Divisi</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>

                <div class="col-lg-12">
                    <br>
                    <!-- Nama divisi -->
                    <div class="form-group"><label>Nama Divisi</label>
                        <input type="hidden" id="iddivisi" name="iddivisi">
                        <input class="form-control" name="divisi" id="divisi" type="text" placeholder="">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text text-white">Simpan Perubahan</span>
                    </button>
                    <button type="button" class="btn btn-danger btn-icon-split" data-dismiss="modal">
                        <span class="icon text-white-50">
                            <i class="fas fa-times"></i>
                        </span>
                        <span class="text text-white">Batal</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/divisi.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formdivisi.js"></script>

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