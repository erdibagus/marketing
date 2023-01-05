<!-- Begin Page Content -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h5 mb-0 font-weight-bold text-uppercase text-center text-gray-800">Prospek</h1>
    </div>
    <a href="<?= base_url() ?>prospek/tambah" class="col-lg btn btn-sm bg-gradient-info btn-icon-split">
        <span class="text text-white">Tambah Data</span>
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
    </a>
    <?php if($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'superadmin'): ?>
    <div class="mb-4" id="container">

        <!-- Illustrations -->
        <div class="card border-bottom-secondary shadow mb-4">
        
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="tabel" width="100%">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Tanggal</th>
                                <th>User</th>
                                <th>KPK</th>
                                <th>Kategori</th>
                                <th>Nama Nasabah</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th width="1%">Aksi</th>
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
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="tabelmanajer" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Tanggal</th>
                                <th>User</th>
                                <th>Kategori</th>
                                <th>Nama Nasabah</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
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

    <?php if($this->session->userdata('login_session')['level'] == 'user'): ?>
    <div class="mb-4" id="container">

        <!-- Illustrations -->
        <div class="card border-bottom-secondary shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="tabeluser" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Nama Nasabah</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
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


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/prospek.js"></script>
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
             "url": "<?php echo site_url('prospek/ajax_list')?>",
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
     table = $('#tabeluser').DataTable({ 
  
         "processing": true, //Feature control the processing indicator.
         "serverSide": true, //Feature control DataTables' server-side processing mode.
         "order": [], //Initial no order.
         lengthChange: false,
  
         // Load data for the table's content from an Ajax source
         "ajax": {
             "url": "<?php echo site_url('prospek/ajax_list_user')?>",
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
     table = $('#tabelmanajer').DataTable({ 
  
         "processing": true, //Feature control the processing indicator.
         "serverSide": true, //Feature control DataTables' server-side processing mode.
         "order": [], //Initial no order.
         lengthChange: false,
  
         // Load data for the table's content from an Ajax source
         "ajax": {
             "url": "<?php echo site_url('prospek/ajax_list_manajer')?>",
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