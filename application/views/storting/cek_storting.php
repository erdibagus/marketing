<div class="container-fluid">
    <div class="mb-4" id="container">

    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h5 mb-0 text-center text-uppercase font-weight-bold text-gray-800">Cek Storting</h1>
        </div>
        <div class="mb-4" id="container">

        <!-- Illustrations -->
        <div class="card border-bottom-secondary shadow mb-4">
            <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 mb-4">                       
                            <div class="form-group"><label>Tahun</label>
                                <select name="tahun" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
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
                        <div class="col-lg-3 mb-2">                       
                            <div class="form-group"><label>Marketing</label>
                                <select name="user" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($user as $s): ?>
                                    <option value="<?= $s->id_user ?>"><?= $s->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg mb-4">
                            <a href="#" class="btn btn-md bg-gradient-primary text-white btn-icon-split mb-4" onclick="cek()">
                                <span class="text text-white">Cek</span>
                                <span class="icon text-white-50">
                                    <i class="fas fa-search"></i>
                                </span>
                            </a>
                        </div>
                    </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="tabel" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th width="1%">No</th>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="cursor:pointer;" id="tbody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
</div>

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/cek_storting.js"></script>
<script src="<?= base_url(); ?>assets/js/storting.js"></script>
<script src="<?= base_url(); ?>assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
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