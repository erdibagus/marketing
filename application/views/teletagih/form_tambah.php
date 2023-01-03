<?php date_default_timezone_set('Asia/Jakarta'); ?>
<div class="container-fluid">

    <form action="<?= base_url() ?>teletagih/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <div class="d-sm-flex">
                <h1 class="h5 mb-0 text-center text-uppercase font-weight-bold text-gray-800">Tambah Teletagih</h1>
            </div>
        </div>

        <div class="justify-content-between mb-0">
            <div class="mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-secondary shadow mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h6 class="m-0 font-weight-bold text-white">Form Teletagih</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <!-- Nama teletagih -->
                            <input class="form-control" name="idtm" value="<?= $kode ?>" type="hidden">

                            <input class="h5 text-center form-control-plaintext font-weight-bold mb-3" name="tgl" value="<?= $tglnow ?>" type="text" placeholder=""
                                    autocomplete="off" readonly>
                            
                            <div class="form-group"><label>Nasabah</label>
                                <select name="storting" class="form-control select2">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($storting as $j): ?>
                                    <option class="font-weight-bold" value="<?= $j->id_storting ?>"><?= $j->rek ?> | <?= $j->nama_nasabah ?> (<?= $j->no_hp ?>) </option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group"><label>Nominal Pembayaran</label>
                                <input class="form-control" name="nominal" type="text" id="dengan-rupiah" placeholder="">
                            </div>

                            <div class="form-group"><label>Keterangan</label>
                                <textarea class="form-control" name="keterangan" rows="10" type="text" placeholder=""></textarea>
                            </div>
                            <input class="form-control" name="lokasi" type="hidden" placeholder="">
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-secondary shadow mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h6 class="m-0 font-weight-bold text-white">Lampiran</h6>
                    </div>
                    <div class="card-body">
                        <center>
                            <div id="img">
                                <img src="<?= base_url() ?>assets/upload/teletagih/noimage.png" id="outputImg1" width="200"
                                    maxheight="200">
                            </div>
                            <br>
                        </center>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input class="custom-file-input-1" type="file" id="GetFile1" name="photo1"
                                    onchange="VerifyFileNameAndFileSize1()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                            </div>
                        </div>
                        <center>
                            <div id="img">
                                <img src="<?= base_url() ?>assets/upload/teletagih/noimage.png" id="outputImg2" width="200"
                                    maxheight="200" hidden>
                            </div>
                            <br>
                        </center>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input class="custom-file-input-2" type="file" id="GetFile2" name="photo2" hidden
                                    onchange="VerifyFileNameAndFileSize2()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                            </div>
                        </div>
                        <center>
                            <div id="img">
                                <img src="<?= base_url() ?>assets/upload/teletagih/noimage.png" id="outputImg3" width="200"
                                    maxheight="200" hidden>
                            </div>
                            <br>
                        </center>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input class="custom-file-input-3" type="file" id="GetFile3" name="photo3" hidden
                                    onchange="VerifyFileNameAndFileSize3()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                            </div>
                        </div>
                        <center>
                            <div id="img">
                                <img src="<?= base_url() ?>assets/upload/teletagih/noimage.png" id="outputImg4" width="200"
                                    maxheight="200" hidden>
                            </div>
                            <br>
                        </center>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input class="custom-file-input-4" type="file" id="GetFile4" name="photo4" hidden
                                    onchange="VerifyFileNameAndFileSize4()" accept=".png,.gif,.jpeg,.tiff,.jpg">
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

<script src="<?= base_url(); ?>assets/js/teletagih.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formteletagih.js"></script>
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

<script type='text/javascript'>
$(window).load(function(){
    $("#GetFile1").change(function() {
                console.log($("#GetFile1 input:selected").val());
                if ($("#GetFile1 input:selected").val() == 'Tidak Ada') {
                    $('#GetFile2').prop('hidden', 'true');
                    $('#outputImg2').prop('hidden', 'true');
                } else {
                    $('#GetFile2').prop('hidden', false);
                    $('#outputImg2').prop('hidden', false);
                }
            });
            
    $("#GetFile2").change(function() {
        console.log($("#GetFile2 input:selected").val());
        if ($("#GetFile2 input:selected").val() == 'Tidak Ada') {
            $('#GetFile3').prop('hidden', 'true');
            $('#outputImg3').prop('hidden', 'true');
        } else {
            $('#GetFile3').prop('hidden', false);
            $('#outputImg3').prop('hidden', false);
        }
    });

    $("#GetFile3").change(function() {
        console.log($("#GetFile3 input:selected").val());
        if ($("#GetFile3 input:selected").val() == 'Tidak Ada') {
            $('#GetFile4').prop('hidden', 'true');
            $('#outputImg4').prop('hidden', 'true');
        } else {
            $('#GetFile4').prop('hidden', false);
            $('#outputImg4').prop('hidden', false);
        }
    });
});
</script>

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