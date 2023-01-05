<?php foreach ($data as $d): ?>

<!-- Begin Page Content -->

    <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <div class="d-sm-flex">
                <h1 class="h5 mb-0 font-weight-bold text-uppercase text-center text-gray-800">Detail Storting</h1>
            </div>
        </div>
        <!-- Page Heading -->
        <div class="justify-content-between mb-2">
            <div class="mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-secondary shadow mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h5 class="m-0 font-weight-bold text-white"><?= $d->bulan ?> <?= $d->tahun ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>Nama</td>
                                        <th>: <?=$d->nama?></th>
                                    </tr>
                                    <tr>
                                        <td>KPK</td>
                                        <th>: <?=$d->nama_kantor?></th>
                                    </tr>
                                </table>
                            </div>
                            <hr>
                            <div class="col-sm-8">
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
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5> "Keterangan"</h5>
                                <textarea rows="9" readonly class="form-control"><?= $d->keterangan_storting ?></textarea> 
                            </div>       
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End of Main Content -->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/prospek.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>

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

<script type="text/javascript">
    var map = L.map('mapid').setView([-6.9727204, 110.0718625], 14);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'EBM © <a href="https://www.sekartama.com">SEKARTAMA</a> © <a href="https://www.sekartama.com">TSI</a> <strong><a href="https://www.sekartama.com" target="_blank"></a></strong>',
    tileSize: 512,
    maxZoom: 18,
    zoomOffset: -1,
    id: 'mapbox/streets-v11',
    accessToken: 'pk.eyJ1IjoiZXJkaWJhZ3VzIiwiYSI6ImNsMDk0ODNvcDA5djczamxnNWtnYTB3MGMifQ.iv8T4kOUHzWXn3gFxp6r3w'
    }).addTo(map);

    var curLocation =[-6.9727204,110.0718625];

    map.attributionControl.setPrefix(false);
    var marker = new L.marker(curLocation, {
        draggable: 'true'
    });
    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true'
        });
    });
    map.addLayer(marker);

	getLocation();
	function getLocation() {
	  if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(showPosition);
	  } else {
	    x.innerHTML = "Geolocation is not supported by this browser.";
	  }
	}

	function showPosition(position) {
	  $("[name=lokasi]").val(position.coords.latitude + "," + position.coords.longitude);
	}
   </script>

<?php endif; ?>

<?php endforeach; ?>