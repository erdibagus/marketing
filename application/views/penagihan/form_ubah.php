<?php foreach ($data as $d): ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>penagihan/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <div class="d-sm-flex">
                <h1 class="h5 mb-0 text-center text-uppercase font-weight-bold text-gray-800">Ubah penagihan</h1>
            </div>
        </div>

        <div class="justify-content-between mb-0">
            <div class="mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-secondary shadow mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h6 class="m-0 font-weight-bold text-white">Form penagihan</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">

                            <!-- ID penagihan -->
                            <div class="form-group"><label>ID penagihan</label>
                                <input class="form-control" name="idp" type="text" value="<?= $d->id_penagihan ?>" readonly>
                            </div>

                            <!-- Nama penagihan -->
                            <div class="form-group"><label>Tanggal</label>
                                <input class="form-control" name="tgl" type="text" value="<?= $d->tanggal_penagihan ?>" readonly>
                            </div>

                            <!-- nasabah -->
                            <div class="form-group"><label>Nasabah</label>
                                <select name="nasabah" class="form-control chosen">
                                    <?php foreach($nasabah as $j): ?>

                                    <?php if($d->id_nasabah == $j->id_nasabah): ?>
                                    <option value="<?= $j->id_nasabah ?>" selected><?= $j->nama_nasabah ?> | <?= $j->id_nasabah ?></option>
                                    <?php else: ?>
                                    <option value="<?= $j->id_nasabah ?>"><?= $j->nama_nasabah ?>| <?= $j->no_pmp ?></option>
                                    <?php endif; ?>

                                    <?php endforeach ?>
                                </select>
                            </div>

                             <!-- kolektabilitas -->
                            <div class="form-group"><label>Kolektabilitas</label>
                                <select name="kolektabilitas" class="form-control chosen">
                                    <?php foreach($kolektabilitas as $s): ?>

                                    <?php if($d->id_kolektabilitas == $s->id_kolektabilitas): ?>
                                    <option value="<?= $s->id_kolektabilitas ?>" selected><?= $s->nama_kolektabilitas ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->id_kolektabilitas ?>"><?= $s->nama_kolektabilitas ?></option>
                                    <?php endif; ?>

                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group"><label>Nominal</label>
                                <input class="form-control" name="nominal" type="text" id="dengan-rupiah" value="<?= $d->nominal ?>" placeholder="">
                            </div>

                            <div class="form-group"><label>Keterangan</label>
                                <textarea class="form-control" name="keterangan" type="text" placeholder=""><?= $d->keterangan ?></textarea>
                            </div>

                        </div>

                        <br>
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
                                <img src="<?= base_url() ?>assets/upload/penagihan/<?= $d->foto_p1 ?>" id="outputImg1"
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
                                <img src="<?= base_url() ?>assets/upload/penagihan/<?= $d->foto_p2 ?>" id="outputImg2"
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
                                <img src="<?= base_url() ?>assets/upload/penagihan/<?= $d->foto_p3 ?>" id="outputImg3"
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
                                <img src="<?= base_url() ?>assets/upload/penagihan/<?= $d->foto_p4 ?>" id="outputImg4"
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
<script src="<?= base_url(); ?>assets/js/penagihan.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formpenagihan.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>

<script>
    $(document).ready(function() {
        var dengan_rupiah = document.getElementById('dengan-rupiah');
        dengan_rupiah.addEventListener('keyup', function(e)
        {
            dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
        });
        
        function formatRupiah(angka, prefix)
        {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split    = number_string.split(','),
                sisa     = split[0].length % 3,
                rupiah     = split[0].substr(0, sisa),
                ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
                
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp.' + rupiah : '');
        }
    });
</script>

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