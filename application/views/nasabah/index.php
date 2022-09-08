<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <div class="d-sm-flex">
                <h1 class="h4 mb-0 text-center font-weight-bold text-gray-800">Data Nasabah</h1>
            </div>
        </div>

    <div class="mb-4" id="container">

        <!-- Illustrations -->
        <div class="card border-bottom-secondary shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="tabel" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>No. PMP</th>
                                <th>Nama Nasabah</th>
                                <th>Alamat</th>
                                <th>Kecamatan</th>
                                <th>Desa</th>
                                <th>Agunan</th>
                                <th>No. Telepon</th>
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/nasabah.js"></script>
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

<script type="text/javascript"> 
    var table;  
    $(document).ready(function() {
    
        //datatables
        table = $('#tabel').DataTable({ 
    
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
    
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('nasabah/ajax_list')?>",
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
<?php endif; ?>