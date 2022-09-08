<?php foreach ($data as $d): ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>scoring/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>scoring" class="btn btn-md btn-circle btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Ubah scoring</h1>
            </div>
            <button type="submit" class="btn btn-success btn-md btn-icon-split">
                <span class="text text-white">Simpan Perubahan</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>

        </div>

        <div class="d-sm-flex  justify-content-between mb-0">
            <div class="col-lg-12 mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-secondary shadow mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h6 class="m-0 font-weight-bold text-white">Social Demografic Peminjam</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">             
                            <div class="form-group"><label>Nama Nasabah</label>
                                <input class="form-control" name="nasabah" type="text" value="<?= $d->nama_nasabah ?>" placeholder="" readonly>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">             
                            <div class="form-group"><label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($jenis_kelamin as $s): ?>
                                    <?php if($d->jenis_kelamin == $s->nama_jenis_kelamin): ?>
                                    <option value="<?= $s->nama_jenis_kelamin ?>" selected><?= $s->nama_jenis_kelamin ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_jenis_kelamin ?>|<?= $s->nilai ?>"><?= $s->nama_jenis_kelamin ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Usia</label>
                                <select name="usia" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($usia as $s): ?>
                                    <?php if($d->usia == $s->nama_usia): ?>
                                    <option value="<?= $s->nama_usia ?>" selected><?= $s->nama_usia ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_usia ?>|<?= $s->nilai ?>"><?= $s->nama_usia ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Status Pernikahan</label>
                                <select name="status_pernikahan" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_pernikahan as $s): ?>
                                    <?php if($d->status_pernikahan == $s->nama_status_pernikahan): ?>
                                    <option value="<?= $s->nama_status_pernikahan ?>" selected><?= $s->nama_status_pernikahan ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_status_pernikahan ?>|<?= $s->nilai ?>"><?= $s->nama_status_pernikahan ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Tanggungan</label>
                                <select name="tanggungan" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($tanggungan as $s): ?>
                                    <?php if($d->tanggungan == $s->nama_tanggungan): ?>
                                    <option value="<?= $s->nama_tanggungan ?>" selected><?= $s->nama_tanggungan ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_tanggungan ?>|<?= $s->nilai ?>"><?= $s->nama_tanggungan ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Lama Tinggal di Tempat Tingal Saat Ini</label>
                                <select name="lama_tinggal" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($lama_tinggal as $s): ?>
                                    <?php if($d->lama_tinggal == $s->nama_lama_tinggal): ?>
                                    <option value="<?= $s->nama_lama_tinggal ?>" selected><?= $s->nama_lama_tinggal ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_lama_tinggal ?>|<?= $s->nilai ?>"><?= $s->nama_lama_tinggal ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Lokasi Tempat Tingal</label>
                                <select name="lokasi_tinggal" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($lokasi_tinggal as $s): ?>
                                    <?php if($d->lokasi_tinggal == $s->nama_lokasi_tinggal): ?>
                                    <option value="<?= $s->nama_lokasi_tinggal ?>" selected><?= $s->nama_lokasi_tinggal ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_lokasi_tinggal ?>|<?= $s->nilai ?>"><?= $s->nama_lokasi_tinggal ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Jenis Tempat Tinggal</label>
                                <select name="jenis_tinggal" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($jenis_tinggal as $s): ?>
                                    <?php if($d->jenis_tinggal == $s->nama_jenis_tinggal): ?>
                                    <option value="<?= $s->nama_jenis_tinggal ?>" selected><?= $s->nama_jenis_tinggal ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_jenis_tinggal ?>|<?= $s->nilai ?>"><?= $s->nama_jenis_tinggal ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Memiliki Kendaraan Pribadi</label>
                                <select name="memiliki_kendaraan" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($memiliki_kendaraan as $s): ?>
                                    <?php if($d->memiliki_kendaraan == $s->nama_memiliki_kendaraan): ?>
                                    <option value="<?= $s->nama_memiliki_kendaraan ?>" selected><?= $s->nama_memiliki_kendaraan ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_memiliki_kendaraan ?>|<?= $s->nilai ?>"><?= $s->nama_memiliki_kendaraan ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Kepemilikan Kendaraan</label>
                                <select name="kepemilikan_kendaraan" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($kepemilikan_kendaraan as $s): ?>
                                    <?php if($d->kepemilikan_kendaraan == $s->nama_kepemilikan_kendaraan): ?>
                                    <option value="<?= $s->nama_kepemilikan_kendaraan ?>" selected><?= $s->nama_kepemilikan_kendaraan ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_kepemilikan_kendaraan ?>|<?= $s->nilai ?>"><?= $s->nama_kepemilikan_kendaraan ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Jenis Kendaraan</label>
                                <select name="jenis_kendaraan" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($jenis_kendaraan as $s): ?>
                                    <?php if($d->jenis_kendaraan == $s->nama_jenis_kendaraan): ?>
                                    <option value="<?= $s->nama_jenis_kendaraan ?>" selected><?= $s->nama_jenis_kendaraan ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_jenis_kendaraan ?>|<?= $s->nilai ?>"><?= $s->nama_jenis_kendaraan ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="card border-bottom-secondary shadow mb-4">
                <div class="card-header py-3 bg-secondary">
                    <h6 class="m-0 font-weight-bold text-white">Social Demografic Penanggung</h6>
                </div>
                    <div class="card-body">
                        <div class="col-lg-12">             
                            <div class="form-group"><label>Jenis Kelamin</label>
                                <select name="jenis_kelamin_penanggung" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($jenis_kelamin_penanggung as $s): ?>
                                    <?php if($d->jenis_kelamin_penanggung == $s->nama_jenis_kelamin_penanggung): ?>
                                    <option value="<?= $s->nama_jenis_kelamin_penanggung ?>" selected><?= $s->nama_jenis_kelamin_penanggung ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_jenis_kelamin_penanggung ?>|<?= $s->nilai ?>"><?= $s->nama_jenis_kelamin_penanggung ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Usia</label>
                                <select name="usia_penanggung" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($usia_penanggung as $s): ?>
                                    <?php if($d->usia_penanggung == $s->nama_usia_penanggung): ?>
                                    <option value="<?= $s->nama_usia_penanggung ?>" selected><?= $s->nama_usia_penanggung ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_usia_penanggung ?>|<?= $s->nilai ?>"><?= $s->nama_usia_penanggung ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Status Pernikahan</label>
                                <select name="status_pernikahan_penanggung" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_pernikahan_penanggung as $s): ?>
                                    <?php if($d->status_pernikahan_penanggung == $s->nama_status_pernikahan_penanggung): ?>
                                    <option value="<?= $s->nama_status_pernikahan_penanggung ?>" selected><?= $s->nama_status_pernikahan_penanggung ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_status_pernikahan_penanggung ?>|<?= $s->nilai ?>"><?= $s->nama_status_pernikahan_penanggung ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Tanggungan</label>
                                <select name="tanggungan_penanggung" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($tanggungan_penanggung as $s): ?>
                                    <?php if($d->tanggungan_penanggung == $s->nama_tanggungan_penanggung): ?>
                                    <option value="<?= $s->nama_tanggungan_penanggung ?>" selected><?= $s->nama_tanggungan_penanggung ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_tanggungan_penanggung ?>|<?= $s->nilai ?>"><?= $s->nama_tanggungan_penanggung ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Lama Tinggal di Tempat Tingal Saat Ini</label>
                                <select name="lama_tinggal_penanggung" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($lama_tinggal_penanggung as $s): ?>
                                    <?php if($d->lama_tinggal_penanggung == $s->nama_lama_tinggal_penanggung): ?>
                                    <option value="<?= $s->nama_lama_tinggal_penanggung ?>" selected><?= $s->nama_lama_tinggal_penanggung ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_lama_tinggal_penanggung ?>|<?= $s->nilai ?>"><?= $s->nama_lama_tinggal_penanggung ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Lokasi Tempat Tinggal</label>
                                <select name="lokasi_tinggal_penanggung" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($lokasi_tinggal_penanggung as $s): ?>
                                    <?php if($d->lokasi_tinggal_penanggung == $s->nama_lokasi_tinggal_penanggung): ?>
                                    <option value="<?= $s->nama_lokasi_tinggal_penanggung ?>" selected><?= $s->nama_lokasi_tinggal_penanggung ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_lokasi_tinggal_penanggung ?>|<?= $s->nilai ?>"><?= $s->nama_lokasi_tinggal_penanggung ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Jenis Tempat Tinggal</label>
                                <select name="jenis_tinggal_penanggung" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($jenis_tinggal_penanggung as $s): ?>
                                    <?php if($d->jenis_tinggal_penanggung == $s->nama_jenis_tinggal_penanggung): ?>
                                    <option value="<?= $s->nama_jenis_tinggal_penanggung ?>" selected><?= $s->nama_jenis_tinggal_penanggung ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_jenis_tinggal_penanggung ?>|<?= $s->nilai ?>"><?= $s->nama_jenis_tinggal_penanggung ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Memiliki Kendaraan Pribadi</label>
                                <select name="memiliki_kendaraan_penanggung" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($memiliki_kendaraan_penanggung as $s): ?>
                                    <?php if($d->memiliki_kendaraan_penanggung == $s->nama_memiliki_kendaraan_penanggung): ?>
                                    <option value="<?= $s->nama_memiliki_kendaraan_penanggung ?>" selected><?= $s->nama_memiliki_kendaraan_penanggung ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_memiliki_kendaraan_penanggung ?>|<?= $s->nilai ?>"><?= $s->nama_memiliki_kendaraan_penanggung ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Kepemilikan Kendaraan</label>
                                <select name="kepemilikan_kendaraan_penanggung" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($kepemilikan_kendaraan_penanggung as $s): ?>
                                    <?php if($d->kepemilikan_kendaraan_penanggung == $s->nama_kepemilikan_kendaraan_penanggung): ?>
                                    <option value="<?= $s->nama_kepemilikan_kendaraan_penanggung ?>" selected><?= $s->nama_kepemilikan_kendaraan_penanggung ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_kepemilikan_kendaraan_penanggung ?>|<?= $s->nilai ?>"><?= $s->nama_kepemilikan_kendaraan_penanggung ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Jenis Kendaraan</label>
                                <select name="jenis_kendaraan_penanggung" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($jenis_kendaraan_penanggung as $s): ?>
                                    <?php if($d->jenis_kendaraan_penanggung == $s->nama_jenis_kendaraan_penanggung): ?>
                                    <option value="<?= $s->nama_jenis_kendaraan_penanggung ?>" selected><?= $s->nama_jenis_kendaraan_penanggung ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_jenis_kendaraan_penanggung ?>|<?= $s->nilai ?>"><?= $s->nama_jenis_kendaraan_penanggung ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
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
                                    <?php foreach($bentuk_perusahaan as $s): ?>
                                    <?php if($d->bentuk_perusahaan == $s->nama_bentuk_perusahaan): ?>
                                    <option value="<?= $s->nama_bentuk_perusahaan ?>" selected><?= $s->nama_bentuk_perusahaan ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_bentuk_perusahaan ?>|<?= $s->nilai ?>"><?= $s->nama_bentuk_perusahaan ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Lokasi Perusahaan</label>
                                <select name="lokasi_perusahaan" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($lokasi_perusahaan as $s): ?>
                                    <?php if($d->lokasi_perusahaan == $s->nama_lokasi_perusahaan): ?>
                                    <option value="<?= $s->nama_lokasi_perusahaan ?>" selected><?= $s->nama_lokasi_perusahaan ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_lokasi_perusahaan ?>|<?= $s->nilai ?>"><?= $s->nama_lokasi_perusahaan ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Masa Kerja</label>
                                <select name="masa_kerja" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($masa_kerja as $s): ?>
                                    <?php if($d->masa_kerja == $s->nama_masa_kerja): ?>
                                    <option value="<?= $s->nama_masa_kerja ?>" selected><?= $s->nama_masa_kerja ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_masa_kerja ?>|<?= $s->nilai ?>"><?= $s->nama_masa_kerja ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Bidang Usaha Pekerjaan</label>
                                <select name="bidang_usaha" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($bidang_usaha as $s): ?>
                                    <?php if($d->bidang_usaha == $s->nama_bidang_usaha): ?>
                                    <option value="<?= $s->nama_bidang_usaha ?>" selected><?= $s->nama_bidang_usaha ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_bidang_usaha ?>|<?= $s->nilai ?>"><?= $s->nama_bidang_usaha ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Bagian/Departemen</label>
                                <select name="bagian" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($bagian as $s): ?>
                                    <?php if($d->bagian == $s->nama_bagian): ?>
                                    <option value="<?= $s->nama_bagian ?>" selected><?= $s->nama_bagian ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_bagian ?>|<?= $s->nilai ?>"><?= $s->nama_bagian ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group">Gaji Perbulan<label></label>
                                <select name="gaji" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($gaji as $s): ?>
                                    <?php if($d->gaji == $s->nama_gaji): ?>
                                    <option value="<?= $s->nama_gaji ?>" selected><?= $s->nama_gaji ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_gaji ?>|<?= $s->nilai ?>"><?= $s->nama_gaji ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="card border-bottom-secondary shadow mb-4">
                <div class="card-header py-3 bg-secondary">
                    <h6 class="m-0 font-weight-bold text-white">Pekerjaan Penanggung</h6>
                </div>
                    <div class="card-body">
                        <div class="col-lg-12">             
                            <div class="form-group"><label>Bentuk Perusahaan</label>
                                <select name="bentuk_perusahaan_penanggung" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($bentuk_perusahaan_penanggung as $s): ?>
                                    <?php if($d->bentuk_perusahaan_penanggung == $s->nama_bentuk_perusahaan_penanggung): ?>
                                    <option value="<?= $s->nama_bentuk_perusahaan_penanggung ?>" selected><?= $s->nama_bentuk_perusahaan_penanggung ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_bentuk_perusahaan_penanggung ?>|<?= $s->nilai ?>"><?= $s->nama_bentuk_perusahaan_penanggung ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Lokasi Perusahaan</label>
                                <select name="lokasi_perusahaan_penanggung" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($lokasi_perusahaan_penanggung as $s): ?>
                                    <?php if($d->lokasi_perusahaan_penanggung == $s->nama_lokasi_perusahaan_penanggung): ?>
                                    <option value="<?= $s->nama_lokasi_perusahaan_penanggung ?>" selected><?= $s->nama_lokasi_perusahaan_penanggung ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_lokasi_perusahaan_penanggung ?>|<?= $s->nilai ?>"><?= $s->nama_lokasi_perusahaan_penanggung ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Masa Kerja</label>
                                <select name="masa_kerja_penanggung" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($masa_kerja_penanggung as $s): ?>
                                    <?php if($d->masa_kerja_penanggung == $s->nama_masa_kerja_penanggung): ?>
                                    <option value="<?= $s->nama_masa_kerja_penanggung ?>" selected><?= $s->nama_masa_kerja_penanggung ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_masa_kerja_penanggung ?>|<?= $s->nilai ?>"><?= $s->nama_masa_kerja_penanggung ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group">Bidang Usaha Pekerjaan<label></label>
                                <select name="bidang_usaha_penanggung" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($bidang_usaha_penanggung as $s): ?>
                                    <?php if($d->bidang_usaha_penanggung == $s->nama_bidang_usaha_penanggung): ?>
                                    <option value="<?= $s->nama_bidang_usaha_penanggung ?>" selected><?= $s->nama_bidang_usaha_penanggung ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_bidang_usaha_penanggung ?>|<?= $s->nilai ?>"><?= $s->nama_bidang_usaha_penanggung ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Bagian/Departemen</label>
                                <select name="bagian_penanggung" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($bagian_penanggung as $s): ?>
                                    <?php if($d->bagian_penanggung == $s->nama_bagian_penanggung): ?>
                                    <option value="<?= $s->nama_bagian_penanggung ?>" selected><?= $s->nama_bagian_penanggung ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_bagian_penanggung ?>|<?= $s->nilai ?>"><?= $s->nama_bagian_penanggung ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Gaji Perbulan</label>
                                <select name="gaji_penanggung" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($gaji_penanggung as $s): ?>
                                    <?php if($d->gaji_penanggung == $s->nama_gaji_penanggung): ?>
                                    <option value="<?= $s->nama_gaji_penanggung ?>" selected><?= $s->nama_gaji_penanggung ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_gaji_penanggung ?>|<?= $s->nilai ?>"><?= $s->nama_gaji_penanggung ?></option>
                                    <?php endif; ?>
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
                                    <?php foreach($besar_pinjam as $s): ?>
                                    <?php if($d->besar_pinjam == $s->nama_besar_pinjam): ?>
                                    <option value="<?= $s->nama_besar_pinjam ?>" selected><?= $s->nama_besar_pinjam ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_besar_pinjam ?>|<?= $s->nilai ?>"><?= $s->nama_besar_pinjam ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Tenor Pinjaman</label>
                                <select name="tenor_pinjam" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($tenor_pinjam as $s): ?>
                                    <?php if($d->tenor_pinjam == $s->nama_tenor_pinjam): ?>
                                    <option value="<?= $s->nama_tenor_pinjam ?>" selected><?= $s->nama_tenor_pinjam ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_tenor_pinjam ?>|<?= $s->nilai ?>"><?= $s->nama_tenor_pinjam ?></option>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">             
                            <div class="form-group"><label>Tujuan Pinjaman</label>
                                <select name="tujuan_pinjam" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($tujuan_pinjam as $s): ?>
                                    <?php if($d->tujuan_pinjam == $s->nama_tujuan_pinjam): ?>
                                    <option value="<?= $s->nama_tujuan_pinjam ?>" selected><?= $s->nama_tujuan_pinjam ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->nama_tujuan_pinjam ?>|<?= $s->nilai ?>"><?= $s->nama_tujuan_pinjam ?></option>
                                    <?php endif; ?>
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
                                    <input class="form-control" name="installment" value="<?= $s->installment_ratio ?>" type="text" onBlur="stopCalc();" readonly>
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
                                    <input class="form-control" name="colateral" value="<?= $s->colateral_ratio ?>" type="text" onBlur="stopCalc();" readonly>
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

<?php if($this->session->flashdata('Pesan')): ?>

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

<script>
function startCalc(){

    interval = setInterval("calc()",1);}
    function calc(){
        one = document.myForm.penghasilan.value;
        two = document.myForm.angsuran.value;
        three = document.myForm.harga.value;
        four = document.myForm.pinjaman.value;
        document.myForm.installment.value = two / one * 100;
        five = three * 80 / 100;
        document.myForm.colateral.value = four / five * 100
    }
    function stopCalc(){

clearInterval(interval);}

</script>
<?php endif; ?>

<?php endforeach; ?>