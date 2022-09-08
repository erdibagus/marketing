<?php foreach ($data as $d): ?>

<!-- Begin Page Content -->
    <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>scoring" class="btn btn-md btn-circle btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Detail scoring</h1>
            </div>
        </div>
        <!-- Page Heading -->
        <div class="d-sm-flex justify-content-between mb-2">
            <div class="col-lg-12 mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-secondary shadow mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h3 class="m-0 font-weight-bold text-white"><?php if ($d->hasil >=70 ) {
                                        echo '<span class="badge badge-success">LAYAK';
                                    } elseif ($d->hasil < 70) {
                                        echo '<span class="badge badge-danger">TIDAK LAYAK';
                                    }
                                ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <div class="h5 mb-0 text-gray-800"><b>"<?= $d->nama ?>" | <?= $d->nama_kantor ?></b></div>
                                <hr class="bg-dark">
                                Nama Nasabah    = <?= $d->nama_nasabah ?> <br>
                                Alamat          = <?= $d->alamat ?> <br>
                                Kabupaten       = <?= $d->nama_kabupaten ?> <br>
                                Kecamatan       = <?= $d->nama_kecamatan ?> <br>
                                Desa            = <?= $d->nama_desa ?> <br>
                                Sistem Pinjam            = <?= $d->nama_sistem_pinjam ?> <br>
                                Jangka Waktu            = <?= $d->jangka ?> <br>
                                Plafon            = <?= $d->plafon ?> <br>
                                No. Telepon     = <?= $d->no_tlp ?> <br>
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <address>
                                <hr class="bg-dark">
                                <div class="h5 mb-0 text-gray-800"><b>Social Demografic Peminjam</b></div>
                                Jenis Kelamin    = <?= $d->jenis_kelamin ?> <br>
                                Usia          = <?= $d->usia ?> <br>
                                Status Pernikahan       = <?= $d->status_pernikahan ?> <br>
                                Tanggungan       = <?= $d->tanggungan ?> <br>
                                Lama Tinggal di Tempat Tinggal Saat Ini = <?= $d->lama_tinggal ?> <br>
                                Lokasi Tempat Tinggal   = <?= $d->lokasi_tinggal ?> <br>
                                Jenis Tempat Tinggal   = <?= $d->jenis_tinggal ?> <br>
                                Memiliki Kendaraan Pribadi   = <?= $d->memiliki_kendaraan ?> <br>
                                Kepemilikan Kendaraan   = <?= $d->kepemilikan_kendaraan ?> <br>
                                Jenis Kendaraan   = <?= $d->jenis_kendaraan ?> <br>
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <address>
                                <hr class="bg-dark">
                                <div class="h5 mb-0 text-gray-800"><b>Social Demografic Penanggung</b></div>
                                Jenis Kelamin    = <?= $d->jenis_kelamin_penanggung ?> <br>
                                Usia          = <?= $d->usia_penanggung ?> <br>
                                Status Pernikahan       = <?= $d->status_pernikahan_penanggung ?> <br>
                                Tanggungan       = <?= $d->tanggungan_penanggung ?> <br>
                                Lama Tinggal di Tempat Tinggal Saat Ini = <?= $d->lama_tinggal_penanggung ?> <br>
                                Lokasi Tempat Tinggal   = <?= $d->lokasi_tinggal_penanggung ?> <br>
                                Jenis Tempat Tinggal   = <?= $d->jenis_tinggal_penanggung ?> <br>
                                Memiliki Kendaraan Pribadi   = <?= $d->memiliki_kendaraan_penanggung ?> <br>
                                Kepemilikan Kendaraan   = <?= $d->kepemilikan_kendaraan_penanggung ?> <br>
                                Jenis Kendaraan   = <?= $d->jenis_kendaraan_penanggung ?> <br>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 invoice-col">
                            </div>
                            <div class="col-sm-4 invoice-col">
                            <address>
                            <hr class="bg-dark">
                                <div class="h5 mb-0 text-gray-800"><b>Pekerjaan Peminjam</b></div>
                                Bentuk Perusahaan    = <?= $d->bentuk_perusahaan ?> <br>
                                Lokasi Perusahaan          = <?= $d->lokasi_perusahaan ?> <br>
                                Masa Kerja       = <?= $d->masa_kerja ?> <br>
                                Bidang Usaha Perusahaan       = <?= $d->bidang_usaha ?> <br>
                                Bagian/Departemen = <?= $d->bagian ?> <br>
                                Gaji Perbulan   = <?= $d->gaji ?> <br>
                                </address>
                            </div>  
                            <div class="col-sm-4 invoice-col">
                            <address>
                            <hr class="bg-dark">
                                <div class="h5 mb-0 text-gray-800"><b>Pekerjaan Penanggung</b></div>
                                Bentuk Perusahaan    = <?= $d->bentuk_perusahaan_penanggung ?> <br>
                                Lokasi Perusahaan          = <?= $d->lokasi_perusahaan_penanggung ?> <br>
                                Masa Kerja       = <?= $d->masa_kerja_penanggung ?> <br>
                                Bidang Usaha Perusahaan       = <?= $d->bidang_usaha_penanggung ?> <br>
                                Bagian/Departemen = <?= $d->bagian_penanggung ?> <br>
                                Gaji Perbulan   = <?= $d->gaji_penanggung ?> <br>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 invoice-col">
                            </div>
                            <div class="col-sm-4 invoice-col">
                            <address>
                            <hr class="bg-dark">
                                <div class="h5 mb-0 text-gray-800"><b>Credit Application</b></div>
                                Besar Pinjaman    = <?= $d->besar_pinjam ?> <br>
                                Tenor Pinjaman    = <?= $d->tenor_pinjam ?> <br>
                                Tujuan Pinjaman   = <?= $d->tujuan_pinjam ?> <br>
                                </address>
                            </div>  
                            <div class="col-sm-4 invoice-col">
                            <address>
                            <hr class="bg-dark">
                                <div class="h5 mb-0 text-gray-800"><b>Financial</b></div>
                                Installment Ratio    = <?= $d->installment_ratio ?>% <br>
                                Colateral Ratio    = <?= $d->colateral_ratio ?>% <br>
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <b><h5>  </b></h5> </label>
                            </div>
                        </div>              
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/scoring.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formscoring.js"></script>
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