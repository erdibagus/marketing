<?php foreach ($data as $d): ?>

<!-- Begin Page Content -->
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-2">
            <div class="d-sm-flex">
                <h1 class="h5 mb-0 text-center text-uppercase font-weight-bold text-gray-800">Detail Penagihan</h1>
            </div>
        </div>
        <!-- Page Heading -->
        <div class="justify-content-between mb-2">
            <div class="mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-secondary shadow mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h5 class="m-0 font-weight-bold text-white"><?= $d->tanggal_teletagih ?></h5>
                    </div>
                    <div class="card-body">
                    <div class="row">
                            <div class="col-sm-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>Nama</td>
                                        <th>: <?=$d->nama?></th>
                                    </tr>
                                    <tr>
                                        <td>KPK</td>
                                        <th>: <?=$d->nama_kantor?></th>
                                    </tr>
                                    <tr>
                                        <td>Nominal Pembayaran</td>
                                        <th>: <?php if($d->nominal == ''): ?>
                                        <i> - </i>
                                        <?php else: ?>
                                        <?= $d->nominal ?>
                                        <?php endif; ?></th>
                                    </tr>
                                </table>
                            </div>
                            <hr>
                            <div class="col-sm-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>Rekening</td>
                                        <th>: <?= $d->rek ?></th>
                                    </tr>
                                    <tr>
                                        <td>Nama Nasabah</td>
                                        <th>: <?= $d->nama_nasabah ?></th>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <th>: <?= $d->alamat ?></th>
                                    </tr>
                                    <tr>
                                        <td>Realisasi</td>
                                        <th>: <?= $d->realisasi ?></th>
                                    </tr>
                                    <tr>
                                        <td>Jatuh Tempo</td>
                                        <th>: <?= $d->jatuh_tempo ?></th>
                                    </tr>
                                    <tr>
                                        <td>Plafon</td>
                                        <th>: <?= $d->plafon ?></th>
                                    </tr>
                                    <tr>
                                        <td>Kolektabilitas</td>
                                        <th>: <?= $d->kolektabilitas ?></th>
                                    </tr>
                                    <tr>
                                        <td>No. Telepon</td>
                                        <th>: <?= $d->no_hp ?></th>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-4 invoice-col">
                                <b><h5> Keterangan </b></h5> </label>
                                <textarea rows="9" readonly class="form-control"><?= $d->keterangan ?></textarea> 
                            </div>
                            
                            <div class="col-sm-8 invoice-col">
  
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <center>
                                            <a href="#" class="pop">								    
                                                <img class="ggs" width="200px"
                                                src="<?= base_url() ?>assets/upload/penagihan/<?= $d->foto_p1?>">
                                            </a>
                                            <a href="#" class="pop">								    
                                                <img class="ggs" width="200px"
                                                src="<?= base_url() ?>assets/upload/penagihan/<?= $d->foto_p2?>">
                                            </a>
                                            <a href="#" class="pop">								    
                                                <img class="ggs" width="200px"
                                                src="<?= base_url() ?>assets/upload/penagihan/<?= $d->foto_p3?>">
                                            </a>
                                            <a href="#" class="pop">								    
                                                <img class="ggs" width="200px"
                                                src="<?= base_url() ?>assets/upload/penagihan/<?= $d->foto_p4?>">
                                            </a>

                                            <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">							   
                                                    <div class="modal-content">         						      
                                                        <div class="modal-body">
                                                            <button type="button" class="close" data-dismiss="modal"><span 
                                                            aria-hidden="true">&times;</span><span class="sr- 
                                                            only">Close</span></button>						        
                                                            <img src="" class="imagepreview" style="width: 100%;">                                 
                                                        </div>							    
                                                    </div>								   
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
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
<script src="<?= base_url(); ?>assets/js/teletagih.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formteletagih.js"></script>
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
   $(function() {
     $('.pop').on('click', function() {
       $('.imagepreview').attr('src',$(this).find('img').attr('src'));
       $('#imagemodal').modal('show');   
       });		
   });
</script>

<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZXJkaWJhZ3VzIiwiYSI6ImNsNnU0dnB5aTBhamMzcW54bmFxc2psd2kifQ.CAXxm_vCwIpAme2TMwtCbw';
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [<?= $d->lokasi ?>],
        
        zoom: 12
    });
    
    // Create a default Marker and add it to the map.
    const marker1 = new mapboxgl.Marker()
    .setLngLat([<?= $d->lokasi ?>])
    .addTo(map);
</script>

<?php endif; ?>

<?php endforeach; ?>