<?php date_default_timezone_set('Asia/Jakarta'); ?>
<div class="container-fluid">

    <form action="<?= base_url() ?>telemarketing/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <div class="d-sm-flex">
                <h1 class="h5 mb-0 text-center text-uppercase font-weight-bold text-gray-800">Tambah Teleprospek</h1>
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
                            <!-- Nama telemarketing -->
                            <input class="form-control" name="idtm" value="<?= $kode ?>" type="hidden">

                            <input class="h5 text-center form-control-plaintext font-weight-bold mb-3" name="tgl" value="<?= $tglnow ?>" type="text" placeholder=""
                                    autocomplete="off" readonly>
                            
                            <div class="form-group"><label>Nasabah</label>
                            <div class="input-group">
                                    <select name="nasabah_id" class="form-control select2">
                                        <option value="">--Pilih--</option>
                                        <?php foreach($nasabah as $j): ?>
                                        <option class="font-weight-bold" value="<?= $j->id_nasabah_prospek ?>"><?= $j->nama_nasabah_prospek ?> | <?= $j->alamat ?> (<?= $j->no_tlp ?>) </option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="input-group-append">
                                        <a class="btn btn-primary" href="<?= base_url() ?>nasabah_prospek/tambah_teleprospek" >
                                            <i class="fas fa-plus fa-sm"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group"><label>Kategori</label>
                                <select name="kategori" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($kategori as $j): ?>
                                    <option value="<?= $j->id_kategori ?>"><?= $j->nama_kategori ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group"><label>Sumber Data</label>
                                <select name="sumber" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($sumber as $j): ?>
                                    <option value="<?= $j->id_sumber ?>"><?= $j->nama_sumber ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group"><label>Usaha</label>
                                <input class="form-control" name="usaha" type="text" placeholder="">
                            </div> 

                            <div class="form-group"><label>Hasil</label>
                                <textarea class="form-control" name="hasil" type="text" rows="10" cols="20" placeholder=""></textarea>
                            </div> 
                            <input class="form-control" name="lokasi" type="hidden" placeholder="">

                        </div>
                    </div>
                </div>
                <div class="card border-bottom-warning shadow mb-4">
                    <div class="card-header py-3 bg-warning">
                        <h6 class="m-0 font-weight-bold text-center text-dark">Kosongkan jika No. Telepon masih sama!</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group"><label>Update No. Telepon</label>
                            <input class="form-control" name="no_tlp" type="tel" placeholder="">
                        </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                    <span class="text text-white">Simpan Data</span>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<script src="<?= base_url(); ?>assets/js/telemarketing.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formtelemarketing.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>

<script>
$('.chosen').chosen({
    width: '100%',

});

$('.select2').select2({
    width: '100%'
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

<script type="text/javascript">
	getLocation();
	function getLocation() {
	  if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(showPosition);
	  } else {
	    x.innerHTML = "Geolocation is not supported by this browser.";
	  }
	}

	function showPosition(position) {
        $("[name=lokasi]").val(position.coords.longitude + "," + position.coords.latitude);
	}
   </script>

<?php endif; ?>