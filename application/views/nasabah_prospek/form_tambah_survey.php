<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>nasabah_prospek/proses_tambah_survey" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <div class="d-sm-flex">
                <h1 class="h4 mb-0 text-center font-weight-bold text-gray-800">Tambah Nasabah</h1>
            </div>
        </div>

        <div class="justify-content-between mb-0">
            <div class="mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-secondary shadow mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h6 class="m-0 font-weight-bold text-white">Form Nasabah</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group"><label>Nama Nasabah</label>
                                <input class="form-control" name="nama_nasabah_prospek" type="text" placeholder="">
                            </div>

                            <div class="form-group"><label>Alamat</label>
                                <textarea class="form-control" name="alamat" type="text" placeholder="" rows="5"></textarea>
                            </div>

                            <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <select class="form-control select2" id="provinsi" name="provinsi">
                                <option value="">--Pilih--</option>
                                <?php foreach ($provinsi as $prov) : ?>
                                    <option value="<?= $prov['id']; ?>"><?= $prov['nama_provinsi']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </div>
                            <div class="form-group" id="lkabupaten" hidden>
                                <label for="kabupaten">Kabupaten/Kota</label>
                                <select class="form-control select2" id="kabupaten" name="kabupaten">
                                    <option value="">--Pilih--</option>
                                </select>
                            </div>
                            <div class="form-group" id="lkecamatan" hidden>
                                <label for="kecamatan">Kecamatan</label>
                                <select class="form-control select2" id="kecamatan" name="kecamatan">
                                    <option value="">--Pilih--</option>
                                </select>
                            </div>
                            <div class="form-group" id="ldesa" hidden>
                                <label for="desa">Desa</label>
                                <select class="form-control select2" id="desa" name="desa">
                                    <option value="">--Pilih--</option>
                                </select>
                            </div>
                            <div class="form-group"><label>No Telepon</label>
                            <span class="text-danger">*hanya angka</span>
                                <input class="form-control" name="no_tlp" type="number" placeholder="">
                            </div>
                        </div>                       
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                    <span class="text text-white">Simpan</span>
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

<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->

<!-- <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script> -->
<script src="<?= base_url(); ?>assets/js/nasabah_prospek.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formnasabah_prospek.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#provinsi').change(function() {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('nasabah/getKabupaten') ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#kabupaten').html(response);
                }
            });
        });

        $('#kabupaten').change(function() {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('nasabah/getKecamatan') ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#kecamatan').html(response);
                }
            });
        });

        $('#kecamatan').change(function() {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('nasabah/getDesa') ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#desa').html(response);
                }
            });
        });
    });
</script>

<script type='text/javascript'>
$(window).load(function(){
    $("#provinsi").change(function() {
                console.log($("#provinsi input:selected").val());
                if ($("#provinsi input:selected").val() == 'Tidak Ada') {
                    $('#lkabupaten').prop('hidden', 'true');
                    
                } else {
                    $('#lkabupaten').prop('hidden', false);
               
                }
            });
            
    $("#kabupaten").change(function() {
        console.log($("#kabupaten input:selected").val());
        if ($("#kabupaten input:selected").val() == 'Tidak Ada') {
            $('#lkecamatan').prop('hidden', 'true');
        } else {
            $('#lkecamatan').prop('hidden', false);
        }
    });

    $("#kecamatan").change(function() {
        console.log($("#kecamatan input:selected").val());
        if ($("#kecamatan input:selected").val() == 'Tidak Ada') {
            $('#ldesa').prop('hidden', 'true');
        } else {
            $('#ldesa').prop('hidden', false);
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
<?php endif; ?>