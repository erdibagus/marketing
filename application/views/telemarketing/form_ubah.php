<?php foreach ($data as $d): ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>telemarketing/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateFormEdit()">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <div class="d-sm-flex">
                <h1 class="h5 mb-0 text-center text-uppercase font-weight-bold text-gray-800">Ubah Teleprospek</h1>
            </div>
        </div>

        <div class="justify-content-between mb-0">
            <div class="mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-secondary shadow mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h6 class="m-0 font-weight-bold text-white">Form Teleprospek</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">

                            <!-- ID telemarketing -->
                            <input class="form-control" name="idtm" type="hidden" value="<?= $d->id_telemarketing ?>">

                            <!-- Nama telemarketing -->
                            <div class="form-group"><label>Tanggal</label>
                                <input class="form-control" name="tgl" type="text" value="<?= $d->tanggal_telemarketing ?>" readonly>
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

                             <!-- sumber -->
                            <div class="form-group"><label>Sumber Data</label>
                                <select name="sumber" class="form-control chosen">
                                    <?php foreach($sumber as $s): ?>

                                    <?php if($d->id_sumber == $s->id_sumber): ?>
                                    <option value="<?= $s->id_sumber ?>" selected><?= $s->nama_sumber ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->id_sumber ?>"><?= $s->nama_sumber ?></option>
                                    <?php endif; ?>

                                    <?php endforeach ?>
                                </select>
                            </div>

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

                            <div class="form-group"><label>Usaha</label>
                                <input class="form-control" name="usaha" type="text" value="<?= $d->usaha ?>" placeholder="">
                            </div>

                            <div class="form-group"><label>Hasil</label>
                                <textarea class="form-control" name="hasil" type="text" rows="10" placeholder=""><?= $d->hasil ?></textarea>
                            </div>
                            <input type="hidden" name="user" value="<?= $d->user_id ?>">
                            <input type="hidden" name="kpk" value="<?= $d->kpk ?>">

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

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/telemarketing.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formtelemarketing.js"></script>
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