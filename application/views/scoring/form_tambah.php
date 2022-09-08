<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>scoring/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <div class="d-sm-flex">
                <h1 class="h5 mb-0 text-center text-uppercase font-weight-bold text-gray-800">Tambah Scoring</h1>
            </div>
        </div>

        <div class="d-sm-flex justify-content-between mb-0">
            <div class="mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-secondary shadow mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h6 class="m-0 font-weight-bold text-white text-center">PROFIL CALON PEMINJAM</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">            
                            <div class="form-group"><label>Nasabah</label>
                                <select name="nasabah" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($nasabah as $j): ?>
                                    <option value="<?= $j->id_survey ?>"><?= $j->nama_nasabah_prospek ?> | <?= $j->alamat ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                
                            <div class="form-group"><label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($jenis_kelamin as $j): ?>
                                    <option value="<?= $j->nama_jenis_kelamin ?>|<?= $j->nilai ?>"><?= $j->nama_jenis_kelamin ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                                
                            <div class="form-group"><label class="text-md-right">Tempat, tanggal lahir</label>
                                <div class="input-group">
                                    <input class="form-control" name="ttl_tempat" type="text" placeholder="tempat">
                                </div>
                            ,
                                <select name="ttl_tanggal" class="form-control">
                                    <?php 
                                    for($tanggal = 1; $tanggal <= 31; $tanggal++) {
                                        if($tanggal < 10) {
                                            echo '<option value="0'. $tanggal .'">0'. $tanggal .'</option>';
                                        }
                                        else {
                                            echo '<option value="'. $tanggal .'">'. $tanggal .'</option>';
                                        }
                                        }
                                    ?>
                                </select>
                                <select name="ttl_bulan" class="form-control">
                                    <?php 
                                        for($bulan = 1; $bulan <= 12; $bulan++) {
                                            if($bulan < 10) {
                                                echo '<option value="0'. $bulan .'">0'. $bulan .'</option>';
                                            }
                                            else {
                                                echo '<option value="'. $bulan .'">'. $bulan .'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                                <select name="ttl_tahun" class="form-control">
                                    <?php 
                                        for($tahun = date('Y'); $tahun >= 1980; $tahun--) {
                                            echo '<option value="'. $tahun .'">'. $tahun .'</option>';
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group"><label>Usia</label>
                                <div class="input-group">
                                    <input name="usia" type="number" class="form-control" placeholder="">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Tahun</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group"><label>NPWP</label>
                                <input name="npwp" type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group"><label>Status Pernikahan</label>
                                <select name="status_pernikahan" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_pernikahan as $j): ?>
                                    <option value="<?= $j->nama_status_pernikahan ?>|<?= $j->nilai ?>"><?= $j->nama_status_pernikahan ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group"><label>Nama Ibu Kandung</label>
                                <input name="ibu" type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group"><label>Nama Istri</label>
                                <input name="istri" type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group"><label>Pekerjaan Istri</label>
                                <input name="pistri" type="text" class="form-control" placeholder="">
                            </div>
                    
                            <div class="form-group"><label>Tanggungan</label>
                                <select name="tanggungan" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($tanggungan as $j): ?>
                                    <option value="<?= $j->nama_tanggungan ?>|<?= $j->nilai ?>"><?= $j->nama_tanggungan ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                
                            <div class="form-group"><label>Lama Tinggal di Tempat Tingal Saat Ini</label>
                                <select name="lama_tinggal" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($lama_tinggal as $j): ?>
                                    <option value="<?= $j->nama_lama_tinggal ?>|<?= $j->nilai ?>"><?= $j->nama_lama_tinggal ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                
                            <div class="form-group"><label>Lokasi Tempat Tingal</label>
                                <select name="lokasi_tinggal" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($lokasi_tinggal as $j): ?>
                                    <option value="<?= $j->nama_lokasi_tinggal ?>|<?= $j->nilai ?>"><?= $j->nama_lokasi_tinggal ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                    
                            <div class="form-group"><label>Jenis Tempat Tinggal</label>
                                <select name="jenis_tinggal" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($jenis_tinggal as $j): ?>
                                    <option value="<?= $j->nama_jenis_tinggal ?>|<?= $j->nilai ?>"><?= $j->nama_jenis_tinggal ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                    
                            <div class="form-group"><label>Memiliki Kendaraan Pribadi</label>
                                <select name="memiliki_kendaraan" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($memiliki_kendaraan as $j): ?>
                                    <option value="<?= $j->nama_memiliki_kendaraan ?>|<?= $j->nilai ?>"><?= $j->nama_memiliki_kendaraan ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                    
                            <div class="form-group"><label>Kepemilikan Kendaraan</label>
                                <select name="kepemilikan_kendaraan" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($kepemilikan_kendaraan as $j): ?>
                                    <option value="<?= $j->nama_kepemilikan_kendaraan ?>|<?= $j->nilai ?>"><?= $j->nama_kepemilikan_kendaraan ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                
                            <div class="form-group"><label>Jenis Kendaraan</label>
                                <select name="jenis_kendaraan" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($jenis_kendaraan as $j): ?>
                                    <option value="<?= $j->nama_jenis_kendaraan ?>|<?= $j->nilai ?>"><?= $j->nama_jenis_kendaraan ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group"><label>Deskripsi Kendaraan</label>
                                <textarea name="npwp" type="text" class="form-control" rows="7" cols="70"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="card border-bottom-secondary shadow mb-4">
                <div class="card-header py-3 bg-secondary">
                    <h6 class="m-0 font-weight-bold text-white">Pekerjaan Peminjam</h6>
                </div>
                    <div class="card-body">
                        <div class="col-lg-12">             
                            <div class="form-group"><label>Bentuk Perusahaan</label>
                                <select name="bentuk_perusahaan" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($bentuk_perusahaan as $j): ?>
                                    <option value="<?= $j->nama_bentuk_perusahaan ?>|<?= $j->nilai ?>"><?= $j->nama_bentuk_perusahaan ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Lokasi Perusahaan</label>
                                <select name="lokasi_perusahaan" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($lokasi_perusahaan as $j): ?>
                                    <option value="<?= $j->nama_lokasi_perusahaan ?>|<?= $j->nilai ?>"><?= $j->nama_lokasi_perusahaan ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Masa Kerja</label>
                                <select name="masa_kerja" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($masa_kerja as $j): ?>
                                    <option value="<?= $j->nama_masa_kerja ?>|<?= $j->nilai ?>"><?= $j->nama_masa_kerja ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Bidang Usaha Pekerjaan</label>
                                <select name="bidang_usaha" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($bidang_usaha as $j): ?>
                                    <option value="<?= $j->nama_bidang_usaha ?>|<?= $j->nilai ?>"><?= $j->nama_bidang_usaha ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Bagian/Departemen</label>
                                <select name="bagian" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($bagian as $j): ?>
                                    <option value="<?= $j->nama_bagian ?>|<?= $j->nilai ?>"><?= $j->nama_bagian ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group">Gaji Perbulan<label></label>
                                <select name="gaji" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($gaji as $j): ?>
                                    <option value="<?= $j->nama_gaji ?>|<?= $j->nilai ?>"><?= $j->nama_gaji ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="card border-bottom-secondary shadow mb-4">
                <div class="card-header py-3 bg-secondary">
                    <h6 class="m-0 font-weight-bold text-white">Credit Application</h6>
                </div>
                    <div class="card-body">
                        <div class="col-lg-12">             
                            <div class="form-group"><label>Besar Pinjaman</label>
                                <select name="besar_pinjam" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($besar_pinjam as $j): ?>
                                    <option value="<?= $j->nama_besar_pinjam ?>|<?= $j->nilai ?>"><?= $j->nama_besar_pinjam ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Tenor Pinjaman</label>
                                <select name="tenor_pinjam" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($tenor_pinjam as $j): ?>
                                    <option value="<?= $j->nama_tenor_pinjam ?>|<?= $j->nilai ?>"><?= $j->nama_tenor_pinjam ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Tujuan Pinjaman</label>
                                <select name="tujuan_pinjam" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($tujuan_pinjam as $j): ?>
                                    <option value="<?= $j->nama_tujuan_pinjam ?>|<?= $j->nilai ?>"><?= $j->nama_tujuan_pinjam ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="card border-bottom-secondary shadow mb-4">
                <div class="card-header py-3 bg-secondary">
                    <h6 class="m-0 font-weight-bold text-white">Financial</h6>
                </div>
                    <div class="card-body">
                        <div class="col-lg-12">             
                            <div class="form-group"><label>Penghasilan Bersih</label>
                                <input class="form-control" name="penghasilan" type="tlp" onFocus="startCalc();">
                            </div>
                            <div class="form-group"><label>Angsuran</label>
                                <input class="form-control" name="angsuran" type="tlp" onFocus="startCalc();">
                            </div>
                            <div class="form-group"><label>Installment Ratio</label>
                                <div class="input-group col-md-2">
                                    <input class="form-control" name="installment" type="text" onBlur="stopCalc();" readonly>
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Harga Pasar</label>
                                <input class="form-control" name="harga" type="tlp" onFocus="startCalc();">
                            </div>
                            <div class="form-group"><label>Pinjaman</label>
                                <input class="form-control" name="pinjaman" type="tlp" onFocus="startCalc();">
                            </div>
                            <div class="form-group"><label>Colateral Ratio</label>
                                <div class="input-group col-md-2">
                                    <input class="form-control" name="colateral" type="text" onBlur="stopCalc();" readonly>
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
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

<script>
function startCalc(){

    interval = setInterval("calc()",1);}
    function calc(){
        one = document.myForm.penghasilan.value;
        two = document.myForm.angsuran.value;
        document.myForm.installment.value = two / one * 100;
        three = document.myForm.harga.value;
        four = document.myForm.pinjaman.value;
        five = three * 80 / 100;
        document.myForm.colateral.value = four / five * 100;
    }
    function stopCalc(){

clearInterval(interval);}

</script>


<?php endif; ?>