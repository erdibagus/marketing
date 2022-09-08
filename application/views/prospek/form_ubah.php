<?php foreach ($data as $d): ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>prospek/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateFormEdit()">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <div class="d-sm-flex">
                <h1 class="h5 mb-0 font-weight-bold text-center text-uppercase text-gray-800">Ubah Prospek</h1>
            </div>
        </div>

        <div class="justify-content-between mb-0">
            <div class="mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-secondary shadow mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h6 class="m-0 font-weight-bold text-white">Form Prospek</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg">

                            <!-- ID prospek -->
                            <input class="form-control" name="idp" type="hidden" value="<?= $d->id_prospek ?>">

                            <!-- Nama prospek -->
                            <div class="form-group"><label>Tanggal</label>
                                <input class="form-control" name="tgl" type="text" value="<?= $d->tanggal_prospek ?>" readonly>
                            </div>

                            <!-- kategori -->
                            <div class="form-group"><label>Kategori</label>
                                <select name="kategori" class="form-control chosen">
                                    <?php foreach($kategori as $j): ?>
                                    <?php if($d->id_kategori == $j->id_kategori): ?>
                                    <option value="<?= $j->id_kategori ?>" selected><?= $j->nama_kategori ?></option>
                                    <?php else: ?>
                                    <option value="<?= $j->id_kategori ?>"><?= $j->nama_kategori ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <!-- <div class="form-group"><label>Kolektabilitas</label>
                                <select name="kolektabilitas" class="form-control chosen">
                                    <?php foreach($kolektabilitas as $s): ?>
                                    <?php if($d->id_kolektabilitas == $s->id_kolektabilitas): ?>
                                    <option value="<?= $s->id_kolektabilitas ?>" selected><?= $s->nama_kolektabilitas ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->id_kolektabilitas ?>"><?= $s->nama_kolektabilitas ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div> -->

                            <div class="form-group"><label>Nasabah</label>
                                <select name="nasabah_id" class="form-control chosen">
                                    <?php foreach($nasabah as $j): ?>
                                    <?php if($d->nasabah_id == $j->id_nasabah_prospek): ?>
                                    <option value="<?= $j->id_nasabah_prospek ?>" selected><?= $j->nama_nasabah_prospek ?> | <?= $j->alamat ?></option>
                                    <?php else: ?>
                                    <option value="<?= $j->id_nasabah_prospek ?>"><?= $j->nama_nasabah_prospek ?> | <?= $j->alamat ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group"><label>Alamat</label>
                                <textarea class="form-control" name="alamat" type="text" placeholder=""><?= $d->alamat ?></textarea>
                            </div>

                            <div class="form-group"><label>No. Telepon</label>
                                <input class="form-control" name="no_tlp" type="tel" value="<?= $d->no_tlp ?>" placeholder="">
                            </div>

                            <div class="form-group"><label>Hasil</label>
                                <input class="form-control" name="hasil" type="text" value="<?= $d->hasil ?>" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-secondary shadow mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h6 class="m-0 font-weight-bold text-white">Foto</h6>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="fotoLama1" value="<?= $d->foto_p1 ?>">
                        <input type="hidden" name="fotoLama2" value="<?= $d->foto_p2 ?>">
                        <input type="hidden" name="fotoLama3" value="<?= $d->foto_p3 ?>">
                        <input type="hidden" name="fotoLama4" value="<?= $d->foto_p4 ?>">
                        <input type="hidden" name="user" value="<?= $d->user_id ?>">
                        <input type="hidden" name="kpk" value="<?= $d->kpk ?>">
                        <input type="hidden" name="lokasi" value="<?= $d->lokasi ?>">
                        <center>
                            <div id="img">
                                <img src="<?= base_url() ?>assets/upload/prospek/<?= $d->foto_p1 ?>" id="outputImg1"
                                    width="200" maxheight="300">
                            </div>
                        </center>
                        <br>
                        <span class="text-danger">*kosongkan jika tidak ingin merubah</span>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input class="custom-file-input1" type="file" id="GetFile1" name="photo1"
                                    onchange="VerifyFileNameAndFileSize1()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                            </div>
                        </div>
                        <center>
                            <div id="img">
                                <img src="<?= base_url() ?>assets/upload/prospek/<?= $d->foto_p2 ?>" id="outputImg2"
                                    width="200" maxheight="300">
                            </div>
                        </center>
                        <br>
                        <span class="text-danger">*kosongkan jika tidak ingin merubah</span>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input class="custom-file-input1" type="file" id="GetFile" name="photo2"
                                    onchange="VerifyFileNameAndFileSize2()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                            </div>
                        </div>
                        <center>
                            <div id="img">
                                <img src="<?= base_url() ?>assets/upload/prospek/<?= $d->foto_p3 ?>" id="outputImg3"
                                    width="200" maxheight="300">
                            </div>
                        </center>
                        <br>
                        <span class="text-danger">*kosongkan jika tidak ingin merubah</span>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input class="custom-file-input1" type="file" id="GetFile" name="photo3"
                                    onchange="VerifyFileNameAndFileSize3()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                            </div>
                        </div>
                        <center>
                            <div id="img">
                                <img src="<?= base_url() ?>assets/upload/prospek/<?= $d->foto_p4 ?>" id="outputImg4"
                                    width="200" maxheight="300">
                            </div>
                        </center>
                        <br>
                        <span class="text-danger">*kosongkan jika tidak ingin merubah</span>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input class="custom-file-input1" type="file" id="GetFile" name="photo4"
                                    onchange="VerifyFileNameAndFileSize4()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                            </div>
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

</div>
<!-- End of Main Content -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/prospek.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formprospek.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>

<script>
$('.chosen').chosen({
    width: '100%',

});
</script>

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
    }).then((result) => {

    })
});
</script>
<?php endif; ?>

<?php endforeach; ?>