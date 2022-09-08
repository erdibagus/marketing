<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h5 mb-0 text-center text-uppercase font-weight-bold  text-gray-800">Laporan Teletagih</h1>
    </div>
    <?php if($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'superadmin'): ?>
    <div class="mb-4" id="container">

        <!-- Illustrations -->
        <div class="card border-bottom-secondary shadow mb-4">
            <div class="card-body">
                <form action="<?= base_url() ?>laporan/teletagih_pdf" method="POST" target="_blank">
                    <div class="row">
                        <div class="col-lg-3 mb-4">
                            <label>Tanggal</label>
                            <div class="input-group">
                                <input readonly name="tglawal" id="datepicker1" autocomplete="off" placeholder="tanggal mulai"
                                    class="form-control border-1 small" value="">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button" id="date1">
                                        <i class="fas fa-calendar fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="input-group">
                                <input readonly name="tglakhir" id="datepicker2" autocomplete="off" placeholder="tanggal akhir"
                                    class="form-control border-1 small" value="">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button" id="date1">
                                        <i class="fas fa-calendar fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                        
                            <div class="form-group"><label>Marketing</label>
                                <select name="user" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($user as $s): ?>
                                    <option value="<?= $s->id_user ?>"><?= $s->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            
                        </div>

                        <div class="col-lg-3 mb-4">
                        
                            <div class="form-group"><label>KPK</label>
                                <select name="kantor" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($kantor as $s): ?>
                                    <option value="<?= $s->id_kantor ?>"><?= $s->nama_kantor ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            
                        </div>

                        <div class="col-lg mb-4">

                            <a href="#" class="btn btn-md bg-gradient-primary text-white btn-icon-split mb-4" onclick="filter()">
                                <span class="text text-white">Filter</span>
                                <span class="icon text-white-50">
                                    <i class="fas fa-search"></i>
                                </span>
                            </a>

                            <a href="#" class="btn btn-md bg-gradient-secondary text-white btn-icon-split mb-4" onclick="reset()">
                                <span class="text text-white">Reset</span>
                                <span class="icon text-white-50">
                                    <i class="fas fa-undo"></i>
                                </span>
                            </a>

                            <!--<button type="submit" class="btn btn-md bg-gradient-danger text-white btn-icon-split mb-4">-->
                            <!--    <span class="text text-white">Cetak PDF</span>-->
                            <!--    <span class="icon text-white-50">-->
                            <!--        <i class="fas fa-file-pdf"></i>-->
                            <!--    </span>-->
                            <!--</button>-->

                        </div>

                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th width="1%">No</th>
                            <th>Tanggal</th>
                            <th>User</th>
                            <th>KPK</th>
                            <th>Kolektabilitas</th>
                            <th>No. Rek</th>
                            <th>Nama Nasabah</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Nominal Pembayaran</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="cursor:pointer;">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <?php endif; ?>
    <?php if($this->session->userdata('login_session')['level'] == 'manajer'): ?>
    <div class="mb-4" id="container">

        <!-- Illustrations -->
        <div class="card border-bottom-secondary shadow mb-4">
            <div class="card-body">
                <form action="<?= base_url() ?>laporan/teletagih_pdf_manajer" method="POST" target="_blank">
                    <div class="row">
                        <div class="col-lg-3 mb-4">
                            <label>Tanggal</label>
                            <div class="input-group">
                                <input readonly name="tglawalmanajer" id="datepicker1manajer" autocomplete="off" placeholder="tanggal mulai"
                                    class="form-control border-1 small" value="">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button" id="date1">
                                        <i class="fas fa-calendar fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="input-group">
                                <input readonly name="tglakhirmanajer" id="datepicker2manajer" autocomplete="off" placeholder="tanggal akhir"
                                    class="form-control border-1 small" value="">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button" id="date1">
                                        <i class="fas fa-calendar fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                        
                            <div class="form-group"><label>Marketing</label>
                                <select name="usermanajer" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($usermanajer as $s): ?>
                                    <option value="<?= $s->id_user ?>"><?= $s->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            
                        </div>

                        <div class="col-lg mb-4">

                            <a href="#" class="btn btn-md bg-gradient-primary text-white btn-icon-split mb-4" onclick="filtermanajer()">
                                <span class="text text-white">Filter</span>
                                <span class="icon text-white-50">
                                    <i class="fas fa-search"></i>
                                </span>
                            </a>

                            <a href="#" class="btn btn-md bg-gradient-secondary text-white btn-icon-split mb-4" onclick="resetmanajer()">
                                <span class="text text-white">Reset</span>
                                <span class="icon text-white-50">
                                    <i class="fas fa-undo"></i>
                                </span>
                            </a>

                            <!--<button type="submit" class="btn btn-md bg-gradient-danger text-white btn-icon-split mb-4">-->
                            <!--    <span class="text text-white">Cetak PDF</span>-->
                            <!--    <span class="icon text-white-50">-->
                            <!--        <i class="fas fa-file-pdf"></i>-->
                            <!--    </span>-->
                            <!--</button>-->

                        </div>

                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="dtHorizontalExamplemanajer" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th width="1%">No</th>
                            <th>Tanggal</th>
                            <th>User</th>
                            <th>Kolektabilitas</th>
                            <th>No. Rek</th>
                            <th>Nama Nasabah</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Nominal Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody style="cursor:pointer;">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <?php endif; ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/laporan/lap_teletagih.js"></script>
<script src="<?= base_url(); ?>assets/js/teletagih.js"></script>
<script src="<?= base_url(); ?>assets/plugin/datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>

<script>
$('#datepicker1').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
});

$('#datepicker2').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
});

$('#datepicker1manajer').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
});

$('#datepicker2manajer').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
});
</script>

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