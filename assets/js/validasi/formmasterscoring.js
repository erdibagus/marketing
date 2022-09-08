function validateFormjenis_kelamin() {
    var jenis_kelamin = document.forms["myForm"]["jenis_kelamin"].value;

    if (jenis_kelamin == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdatejenis_kelamin() {
    var jenis_kelamin = document.forms["myFormUpdate"]["jenis_kelamin"].value;

    if (jenis_kelamin == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateFormusia() {
    var usia = document.forms["myForm"]["usia"].value;

    if (usia == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdateusia() {
    var usia = document.forms["myFormUpdate"]["usia"].value;

    if (usia == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateFormstatus_pernikahan() {
    var status_pernikahan = document.forms["myForm"]["status_pernikahan"].value;

    if (status_pernikahan == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdatestatus_pernikahan() {
    var status_pernikahan = document.forms["myFormUpdate"]["status_pernikahan"].value;

    if (status_pernikahan == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}


function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}

function validateFormtanggungan() {
    var tanggungan = document.forms["myForm"]["tanggungan"].value;

    if (tanggungan == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdatetanggungan() {
    var tanggungan = document.forms["myFormUpdate"]["tanggungan"].value;

    if (tanggungan == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateFormlama_tinggal() {
    var lama_tinggal = document.forms["myForm"]["lama_tinggal"].value;

    if (lama_tinggal == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdatelama_tinggal() {
    var lama_tinggal = document.forms["myFormUpdate"]["lama_tinggal"].value;

    if (lama_tinggal == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateFormlokasi_tinggal() {
    var lokasi_tinggal = document.forms["myForm"]["lokasi_tinggal"].value;

    if (lokasi_tinggal == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdatelokasi_tinggal() {
    var lokasi_tinggal = document.forms["myFormUpdate"]["lokasi_tinggal"].value;

    if (lokasi_tinggal == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateFormjenis_tinggal() {
    var jenis_tinggal = document.forms["myForm"]["jenis_tinggal"].value;

    if (jenis_tinggal == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdatejenis_tinggal() {
    var jenis_tinggal = document.forms["myFormUpdate"]["jenis_tinggal"].value;

    if (jenis_tinggal == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateFormmemiliki_kendaraan() {
    var memiliki_kendaraan = document.forms["myForm"]["memiliki_kendaraan"].value;

    if (memiliki_kendaraan == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdatememiliki_kendaraan() {
    var memiliki_kendaraan = document.forms["myFormUpdate"]["memiliki_kendaraan"].value;

    if (memiliki_kendaraan == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateFormkepemilikan_kendaraan() {
    var kepemilikan_kendaraan = document.forms["myForm"]["kepemilikan_kendaraan"].value;

    if (kepemilikan_kendaraan == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdatekepemilikan_kendaraan() {
    var kepemilikan_kendaraan = document.forms["myFormUpdate"]["kepemilikan_kendaraan"].value;

    if (kepemilikan_kendaraan == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateFormjenis_kendaraan() {
    var jenis_kendaraan = document.forms["myForm"]["jenis_kendaraan"].value;

    if (jenis_kendaraan == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdatejenis_kendaraan() {
    var jenis_kendaraan = document.forms["myFormUpdate"]["jenis_kendaraan"].value;

    if (jenis_kendaraan == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateFormbentuk_usaha() {
    var bentuk_usaha = document.forms["myForm"]["bentuk_usaha"].value;

    if (bentuk_usaha == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdatebentuk_usaha() {
    var bentuk_usaha = document.forms["myFormUpdate"]["bentuk_usaha"].value;

    if (bentuk_usaha == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateFormlokasi_perusahaan() {
    var lokasi_perusahaan = document.forms["myForm"]["lokasi_perusahaan"].value;

    if (lokasi_perusahaan == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdatelokasi_perusahaan() {
    var lokasi_perusahaan = document.forms["myFormUpdate"]["lokasi_perusahaan"].value;

    if (lokasi_perusahaan == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateFormbidang_usaha() {
    var bidang_usaha = document.forms["myForm"]["bidang_usaha"].value;

    if (bidang_usaha == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdatebidang_usaha() {
    var bidang_usaha = document.forms["myFormUpdate"]["bidang_usaha"].value;

    if (bidang_usaha == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateFormbagian() {
    var bagian = document.forms["myForm"]["bagian"].value;

    if (bagian == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdatebagian() {
    var bagian = document.forms["myFormUpdate"]["bagian"].value;

    if (bagian == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateFormgaji() {
    var gaji = document.forms["myForm"]["gaji"].value;

    if (gaji == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdategaji() {
    var gaji = document.forms["myFormUpdate"]["gaji"].value;

    if (gaji == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateFormbesar_pinjam() {
    var besar_pinjam = document.forms["myForm"]["besar_pinjam"].value;

    if (besar_pinjam == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdatebesar_pinjam() {
    var besar_pinjam = document.forms["myFormUpdate"]["besar_pinjam"].value;

    if (besar_pinjam == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateFormtenor_pinjam() {
    var tenor_pinjam = document.forms["myForm"]["tenor_pinjam"].value;

    if (tenor_pinjam == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdatetenor_pinjam() {
    var tenor_pinjam = document.forms["myFormUpdate"]["tenor_pinjam"].value;

    if (tenor_pinjam == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateFormtujuan_pinjam() {
    var tujuan_pinjam = document.forms["myForm"]["tujuan_pinjam"].value;

    if (tujuan_pinjam == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdatetujuan_pinjam() {
    var tujuan_pinjam = document.forms["myFormUpdate"]["tujuan_pinjam"].value;

    if (tujuan_pinjam == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateForminstallment_ratio() {
    var installment_ratio = document.forms["myForm"]["installment_ratio"].value;

    if (installment_ratio == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdateinstallment_ratio() {
    var installment_ratio = document.forms["myFormUpdate"]["installment_ratio"].value;

    if (installment_ratio == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateFormcolateral_ratio() {
    var colateral_ratio = document.forms["myForm"]["colateral_ratio"].value;

    if (colateral_ratio == "") {
        validasi('Jenis Kelamin wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdatecolateral_ratio() {
    var colateral_ratio = document.forms["myFormUpdate"]["colateral_ratio"].value;

    if (colateral_ratio == "") {
        validasi('Jenis Kelamin tidak boleh kosong!', 'warning');
        return false;
    }

}

