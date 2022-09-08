$(document).ready(function () {
    $('#dtHorizontalExample').DataTable({
        "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');


});

function ambilDatajenis_kelamin(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatajenis_kelamin';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idjenis_kelamin').val(hasil[0].id);
            $('#jenis_kelamin').val(hasil[0].nama_jenis_kelamin);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasijenis_kelamin(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapusjenis_kelamin/" + id;
                }
            );
        }
    });
}

function ambilDatausia(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatausia';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idusia').val(hasil[0].id);
            $('#usia').val(hasil[0].nama_usia);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasiusia(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapususia/" + id;
                }
            );
        }
    });
}

function ambilDatastatus_pernikahan(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatastatus_pernikahan';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idstatus_pernikahan').val(hasil[0].id);
            $('#status_pernikahan').val(hasil[0].nama_status_pernikahan);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasistatus_pernikahan(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapusstatus_pernikahan/" + id;
                }
            );
        }
    });
}

function ambilDatatanggungan(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatatanggungan';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idtanggungan').val(hasil[0].id);
            $('#tanggungan').val(hasil[0].nama_tanggungan);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasitanggungan(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapustanggungan/" + id;
                }
            );
        }
    });
}

function ambilDatalama_tinggal(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatalama_tinggal';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idlama_tinggal').val(hasil[0].id);
            $('#lama_tinggal').val(hasil[0].nama_lama_tinggal);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasilama_tinggal(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapuslama_tinggal/" + id;
                }
            );
        }
    });
}

function ambilDatalokasi_tinggal(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatalokasi_tinggal';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idlokasi_tinggal').val(hasil[0].id);
            $('#lokasi_tinggal').val(hasil[0].nama_lokasi_tinggal);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasilokasi_tinggal(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapuslokasi_tinggal/" + id;
                }
            );
        }
    });
}

function ambilDatajenis_tinggal(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatajenis_tinggal';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idjenis_tinggal').val(hasil[0].id);
            $('#jenis_tinggal').val(hasil[0].nama_jenis_tinggal);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasijenis_tinggal(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapusjenis_tinggal/" + id;
                }
            );
        }
    });
}

function ambilDatamemiliki_kendaraan(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatamemiliki_kendaraan';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idmemiliki_kendaraan').val(hasil[0].id);
            $('#memiliki_kendaraan').val(hasil[0].nama_memiliki_kendaraan);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasimemiliki_kendaraan(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapusmemiliki_kendaraan/" + id;
                }
            );
        }
    });
}

function ambilDatakepemilikan_kendaraan(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatakepemilikan_kendaraan';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idkepemilikan_kendaraan').val(hasil[0].id);
            $('#kepemilikan_kendaraan').val(hasil[0].nama_kepemilikan_kendaraan);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasikepemilikan_kendaraan(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapuskepemilikan_kendaraan/" + id;
                }
            );
        }
    });
}

function ambilDatajenis_kendaraan(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatajenis_kendaraan';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idjenis_kendaraan').val(hasil[0].id);
            $('#jenis_kendaraan').val(hasil[0].nama_jenis_kendaraan);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasijenis_kendaraan(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapusjenis_kendaraan/" + id;
                }
            );
        }
    });
}

function ambilDatabentuk_perusahaan(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatabentuk_perusahaan';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idbentuk_perusahaan').val(hasil[0].id);
            $('#bentuk_perusahaan').val(hasil[0].nama_bentuk_perusahaan);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasibentuk_perusahaan(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapusbentuk_perusahaan/" + id;
                }
            );
        }
    });
}
function ambilDatalokasi_perusahaan(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatalokasi_perusahaan';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idlokasi_perusahaan').val(hasil[0].id);
            $('#lokasi_perusahaan').val(hasil[0].nama_lokasi_perusahaan);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasilokasi_perusahaan(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapuslokasi_perusahaan/" + id;
                }
            );
        }
    });
}

function ambilDatamasa_kerja(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatamasa_kerja';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idmasa_kerja').val(hasil[0].id);
            $('#masa_kerja').val(hasil[0].nama_masa_kerja);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasimasa_kerja(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapusmasa_kerja/" + id;
                }
            );
        }
    });
}

function ambilDatabagian(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatabagian';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idbagian').val(hasil[0].id);
            $('#bagian').val(hasil[0].nama_bagian);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasibagian(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapusbagian/" + id;
                }
            );
        }
    });
}

function ambilDatagaji(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatagaji';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idgaji').val(hasil[0].id);
            $('#gaji').val(hasil[0].nama_gaji);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasigaji(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapusgaji/" + id;
                }
            );
        }
    });
}
function ambilDatabesar_pinjaman(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatabesar_pinjaman';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idbesar_pinjaman').val(hasil[0].id);
            $('#besar_pinjaman').val(hasil[0].nama_besar_pinjaman);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasibesar_pinjaman(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapusbesar_pinjaman/" + id;
                }
            );
        }
    });
}

function ambilDatatenor_pinjaman(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatatenor_pinjaman';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idtenor_pinjaman').val(hasil[0].id);
            $('#tenor_pinjaman').val(hasil[0].nama_tenor_pinjaman);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasitenor_pinjaman(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapustenor_pinjaman/" + id;
                }
            );
        }
    });
}

function ambilDatatujuan_pinjaman(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatatujuan_pinjaman';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idtujuan_pinjaman').val(hasil[0].id);
            $('#tujuan_pinjaman').val(hasil[0].nama_tujuan_pinjaman);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasitujuan_pinjaman(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapustujuan_pinjaman/" + id;
                }
            );
        }
    });
}

function ambilDatainstallment_ratio(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatainstallment_ratio';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idinstallment_ratio').val(hasil[0].id);
            $('#installment_ratio').val(hasil[0].nama_installment_ratio);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasiinstallment_ratio(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapusinstallment_ratio/" + id;
                }
            );
        }
    });
}

function ambilDatacolateral_ratio(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'masterscoring/getDatacolateral_ratio';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#idcolateral_ratio').val(hasil[0].id);
            $('#colateral_ratio').val(hasil[0].nama_colateral_ratio);
            $('#nilai').val(hasil[0].nilai);

        }
    });
}

function konfirmasicolateral_ratio(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 300,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "masterscoring/proses_hapuscolateral_ratio/" + id;
                }
            );
        }
    });
}