<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h5 mb-0 font-weight-bold text-uppercase text-center text-gray-800">Storting</h1>
    </div>
    <?php if($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'superadmin'): ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-striped" id="tabel" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Marketing</th>
                                    <th>Rekening</th>
                                    <th>Nama Nasabah</th>
                                    <th>Alamat</th>
                                    <th>Realisasi</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Plafon</th>
                                    <th>Baki Debet</th>
                                    <th>Pokok</th>
                                    <th>Bunga</th>
                                    <th>Denda</th>
                                    <th>Kol</th>
                                    <th>No. HP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- DataTables -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- / .col -->
    </div>
    <?php endif; ?>
    <?php if($this->session->userdata('login_session')['level'] == 'manajer'): ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-striped" id="tabelmanajer" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Marketing</th>
                                    <th>Rekening</th>
                                    <th>Nama Nasabah</th>
                                    <th>Alamat</th>
                                    <th>Realisasi</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Plafon</th>
                                    <th>Baki Debet</th>
                                    <th>Pokok</th>
                                    <th>Bunga</th>
                                    <th>Denda</th>
                                    <th>Kol</th>
                                    <th>No. HP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- DataTables -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- / .col -->
    </div>
    <?php endif; ?>
    <?php if($this->session->userdata('login_session')['level'] == 'user'): ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-striped" id="tabeluser" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Rekening</th>
                                    <th>Nama Nasabah</th>
                                    <th>Alamat</th>
                                    <th>Realisasi</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Plafon</th>
                                    <th>Baki Debet</th>
                                    <th>Pokok</th>
                                    <th>Bunga</th>
                                    <th>Denda</th>
                                    <th>Kol</th>
                                    <th>No. HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- DataTables -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- / .col -->
    </div>
    <?php endif; ?>
    
    <!-- / .row -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h5 mb-0 font-weight-bold text-uppercase text-center text-gray-800">Selesai</h1>
    </div>
    <?php if($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'superadmin'): ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-striped" id="tabelselesai" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Bulan</th>
                                    <th>Marketing</th>
                                    <th>Rekening</th>
                                    <th>Nama Nasabah</th>
                                    <th>Alamat</th>
                                    <th>Realisasi</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Plafon</th>
                                    <th>Baki Debet</th>
                                    <th>Pokok</th>
                                    <th>Bunga</th>
                                    <th>Denda</th>
                                    <th>Kol</th>
                                    <th>No. HP</th>
                                </tr>
                            </thead>
                            <tbody style="cursor:pointer;">
                                <!-- DataTables -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- / .col -->
    </div>
    <?php endif; ?>
    <?php if($this->session->userdata('login_session')['level'] == 'manajer'): ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-striped" id="tabelselesaimanajer" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Bulan</th>
                                    <th>Marketing</th>
                                    <th>Rekening</th>
                                    <th>Nama Nasabah</th>
                                    <th>Alamat</th>
                                    <th>Realisasi</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Plafon</th>
                                    <th>Baki Debet</th>
                                    <th>Pokok</th>
                                    <th>Bunga</th>
                                    <th>Denda</th>
                                    <th>Kol</th>
                                    <th>No. HP</th>
                                </tr>
                            </thead>
                            <tbody style="cursor:pointer;">
                                <!-- DataTables -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- / .col -->
    </div>
    <?php endif; ?>
    <?php if($this->session->userdata('login_session')['level'] == 'user'): ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-striped" id="tabelselesaiuser" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Bulan</th>
                                    <th>Rekening</th>
                                    <th>Nama Nasabah</th>
                                    <th>Alamat</th>
                                    <th>Realisasi</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Plafon</th>
                                    <th>Baki Debet</th>
                                    <th>Pokok</th>
                                    <th>Bunga</th>
                                    <th>Denda</th>
                                    <th>Kol</th>
                                    <th>No. HP</th>
                                </tr>
                            </thead>
                            <tbody style="cursor:pointer;">
                                <!-- DataTables -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- / .col -->
    </div>
</div>
<?php endif; ?>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Detail -->
<div class="modal fade" id="formU" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?= base_url() ?>storting/proses_ubah" name="myForm" method="POST"
        onsubmit="return validateForm()">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-warning">
                    <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Storting Selesai !!!</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <input type="hidden" id="idstorting" name="idstorting">
                <input type="hidden" id="status" name="status" value="1">

                <div class="col-lg-12">
                    <!-- Nama storting -->
                    <hr>
                    <input readonly class="text-center font-weight-bold form-control-plaintext" name="nama_nasabah" id="nama_nasabah" type="text" placeholder="">
                    <hr>
                </div>

                <div class="col-lg-12">
                    <!-- Nama storting -->
                    <div class="form-group"><label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="7" type="text"></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn bg-gradient-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text text-white">Selesai</span>
                    </button>
                    <button type="button" class="btn bg-gradient-danger btn-icon-split" data-dismiss="modal">
                        <span class="icon text-white-50">
                            <i class="fas fa-times"></i>
                        </span>
                        <span class="text text-white">Batal</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formstorting.js"></script>
<script src="<?= base_url(); ?>assets/js/storting.js"></script>

<?php if($this->session->flashdata('Pesan')): ?>
<?= $this->session->flashdata('Pesan') ?>
<?php else: ?>

<script type="text/javascript"> 
var table;
  
 $(document).ready(function() {
  
     //datatables
     table = $('#tabel').DataTable({ 
  
         "processing": true, //Feature control the processing indicator.
         "serverSide": true, //Feature control DataTables' server-side processing mode.
         "order": [], //Initial no order.
         lengthChange: false,
  
         // Load data for the table's content from an Ajax source
         "ajax": {
             "url": "<?php echo site_url('storting/ajax_list')?>",
             "type": "POST"
         },
  
         //Set column definition initialisation properties.
         "columnDefs": [
         { 
             "targets": [ -1 ], //first column / numbering column
             "orderable": false, //set not orderable
         },
         ],
  
     });

     //datatables
     table = $('#tabelmanajer').DataTable({ 
  
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        lengthChange: false,

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('storting/ajax_list_manajer')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

        });

        //datatables
    table = $('#tabeluser').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        lengthChange: false,

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('storting/ajax_list_peruser')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

 });
 </script>

<script type="text/javascript"> 
var table;
  
 $(document).ready(function() {
  
     //datatables
     table = $('#tabelselesai').DataTable({ 
  
         "processing": true, //Feature control the processing indicator.
         "serverSide": true, //Feature control DataTables' server-side processing mode.
         "order": [], //Initial no order.
         lengthChange: false,
  
         // Load data for the table's content from an Ajax source
         "ajax": {
             "url": "<?php echo site_url('storting/ajax_list_selesai')?>",
             "type": "POST"
         },
  
         //Set column definition initialisation properties.
         "columnDefs": [
         { 
             "targets": [ -1 ], //first column / numbering column
             "orderable": false, //set not orderable
         },
         ],
  
     });

     table = $('#tabelselesaimanajer').DataTable({ 
  
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        lengthChange: false,

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('storting/ajax_list_selesai_manajer')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

     });

    table = $('#tabelselesaiuser').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        lengthChange: false,

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('storting/ajax_list_selesai_peruser')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

 });
 </script>

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