<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h5 mb-0 text-center text-uppercase font-weight-bold text-gray-800">Import Storting</h1>
    </div>
<div class="mb-4" id="container">

  <div class="card border-bottom-secondary shadow mb-4">
    <div class="card-body">
        <form method="POST" action="<?= base_url() ?>storting/upload" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
            <div class="row">
                <div class="col-lg-12 mb-2">
                <span class="font-weight-bold text-dark">Petunjuk!</span>
                    <p>Upload data Storting dilakukan dengan mengcopy data dari MBS Online, kemudian paste di template Excel. Silahkan download formatnya <a href="<?= base_url() ?>assets/upload/Template Upload Storting.xlsx"><span class="badge badge-success">Disini</span></a>.
                </div>
                <div class="col-lg-3 mb-4">                       
                    <div class="form-group"><label>Tahun</label>
                        <select name="tahun" class="form-control chosen">
                            <option value="">--Pilih--</option>
                            <option value="<?= $yearnow ?>"><?= $yearnow ?></option>
                            <option value="<?= $nextyear ?>"><?= $nextyear ?></option>
                        </select>
                    </div>                            
                </div>
                
                <div class="col-lg-3 mb-4">                       
                    <div class="form-group"><label>Bulan</label>
                        <select name="bulan" class="form-control chosen">
                            <option value="">--Pilih--</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Deember">Desember</option>
                        </select>
                    </div>                            
                </div>

                <div class="col-lg-3 mb-4">                       
                    <div class="form-group"><label>Marketing</label>
                        <select name="user" class="form-control chosen">
                            <option value="">--Pilih--</option>
                            <?php foreach($user as $s): ?>
                            <option value="<?= $s->id_user ?>|<?= $s->kantor_id ?>"><?= $s->nama ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>                            
                </div>
                <input name="status" type="hidden" class="form-control" value="0">
            </div>
            

						<div class="form-group">
							<textarea placeholder="Copy data yang akan dimasukan dari file excel, dan paste disini" rows="8" class="form-control" name="rows"></textarea>
						</div>
						
            <div class="row">
                <div class="col-lg-3 mb-4">
                    <div class="form-group"><label class="text-dark font-weight-bold">Pilih File Excel</label>
                        <input type="file" name="userfile" id="excel" class="form-control" accept=".xlsx">
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <button type="submit" class="btn bg-gradient-success btn-md btn-icon-split">
                        <span class="text text-white">Upload</span>
                            <span class="icon text-white-50">
                                <i class="fas fa-upload"></i>
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h5 mb-0 text-center text-uppercase font-weight-bold text-gray-800">Cek</h1>
    </div>
    <div class="mb-4" id="container">

        <!-- Illustrations -->
        <div class="card border-bottom-secondary shadow mb-4">
            <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 mb-2">
                        
                            <div class="form-group"><label>Marketing</label>
                                <select name="usercek" class="form-control chosen" onchange="cek()">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($usercek as $s): ?>
                                    <option value="<?= $s->id_user ?>"><?= $s->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            
                        </div>
                        <!-- <div class="col-lg mb-4">

                            <a href="#" class="btn btn-md bg-gradient-danger text-white btn-icon-split mb-4" onclick="konfirmasi()">
                                <span class="text text-white">Hapus</span>
                                <span class="icon text-white-50">
                                    <i class="fas fa-times"></i>
                                </span>
                            </a>

                        </div> -->

                    </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            
                                <th>No</th>
                                <th>No. Rek</th>
                                <th>Nama Nasabah</th>
                                <th>Alamat</th>
                                <th>Realisasi</th>
                                <th>Jatuh Tempo</th>
                                <th>Plafon</th>
                                <th>Baki Debet</th>
                                <th>Pokok</th>
                                <th>Bunga</th>
                                <th>Denda</th>
                                <th>Kolektabilitas</th>
                                <th>No. HP</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
</div>

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/import.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formimport.js"></script>
<script src="<?= base_url(); ?>assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formimport.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>


<script>
$('.chosen').chosen({
    width: '100%',

});
</script>

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