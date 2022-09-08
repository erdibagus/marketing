function validateForm() {
    var kategori = document.forms["myForm"]["kategori"].value;
    var nama_nasabah = document.forms["myForm"]["nasabah_id"].value;
    var sistem_pinjam = document.forms["myForm"]["sistem_pinjam"].value;
    var kategori = document.forms["myForm"]["kategori"].value;
    var jangka = document.forms["myForm"]["jangka"].value;
    var tujuan = document.forms["myForm"]["tujuan"].value;
    var agunan = document.forms["myForm"]["agunan"].value;
    var usaha = document.forms["myForm"]["usaha"].value;
    var plafon = document.forms["myForm"]["plafon"].value;
    var lokasi = document.forms["myForm"]["lokasi"].value;
    var lat = document.forms["myForm"]["lat"].value;
    var long = document.forms["myForm"]["long"].value;

    if (nama_nasabah == '') {
        validasi('Nasabah wajib di isi!', 'warning');
        return false;
    } else if (kategori == '') {
        validasi('Kategori wajib di isi!', 'warning');
        return false;
    } else if (sistem_pinjam == '') {
        validasi('Sistem Pinjam wajib di isi!', 'warning');
        return false;
    } else if (jangka == '') {
        validasi('Jangka Waktu wajib di isi!', 'warning');
        return false;
    } else if (tujuan == '') {
        validasi('Tujuan wajib di isi!', 'warning');
        return false;
    } else if (agunan == '') {
        validasi('Agunan wajib di isi!', 'warning');
        return false;
    } else if (usaha == '') {
        validasi('Usaha wajib di isi!', 'warning');
        return false;
    } else if (plafon == '') {
        validasi('Plafon wajib di isi!', 'warning');
        return false;
    } else if (lokasi == '') {
        validasi('Aktifkan GPS dan refresh halaman', 'warning');
        return false;
    } else if (lat == '') {
        validasi('Aktifkan GPS dan refresh halaman', 'warning');
        return false;
    } else if (long == '') {
        validasi('Aktifkan GPS dan refresh halaman', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var kategori = document.forms["myForm"]["kategori"].value;
    var nama_nasabah = document.forms["myForm"]["nama_nasabah"].value;
    var alamat = document.forms["myForm"]["alamat"].value;
    var sistem_pinjam = document.forms["myForm"]["sistem_pinjam"].value;
    var jangka = document.forms["myForm"]["jangka"].value;
    var tujuan = document.forms["myForm"]["tujuan"].value;
    var no_tlp = document.forms["myForm"]["no_tlp"].value;
    var agunan = document.forms["myForm"]["agunan"].value;
    var usaha = document.forms["myForm"]["usaha"].value;
    var plafon = document.forms["myForm"]["plafon"].value;

    if (kategori == "") {
        validasi('Kategori wajib di isi!', 'warning');
        return false;
    } else if (nama_nasabah == '') {
        validasi('Nama Nasabah wajib di isi!', 'warning');
        return false;
    } else if (alamat == '') {
        validasi('Alamat wajib di isi!', 'warning');
        return false;
    } else if (no_tlp == '') {
        validasi('No. Telpon wajib di isi!', 'warning');
        return false;
    } else if (sistem_pinjam == '') {
        validasi('Sistem Pinjam wajib di isi!', 'warning');
        return false;
    } else if (jangka == '') {
        validasi('Jangka Waktu wajib di isi!', 'warning');
        return false;
    } else if (tujuan == '') {
        validasi('Tujuan wajib di isi!', 'warning');
        return false;
    } else if (agunan == '') {
        validasi('Agunan wajib di isi!', 'warning');
        return false;
    } else if (usaha == '') {
        validasi('Usaha wajib di isi!', 'warning');
        return false;
    } else if (plafon == '') {
        validasi('Plafon wajib di isi!', 'warning');
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


function fileIsValid(fileName) {
    var ext = fileName.match(/\.([^\.]+)$/)[1];
    ext = ext.toLowerCase();
    var isValid = true;
    switch (ext) {
        case 'png':
        case 'jpeg':
        case 'jpg':
        case 'tiff':
        case 'gif':
        case 'tif':

            break;
        default:
            this.value = '';
            isValid = false;
    }
    return isValid;
}

function VerifyFileNameAndFileSize1() {
    var file = document.getElementById('GetFile1').files[0];


    if (file != null) {
        var fileName = file.name;
        if (fileIsValid(fileName) == false) {
            validasi('Format bukan gambar!', 'warning');
            document.getElementById('GetFile1').value = null;
            return false;
        }
        var content;
        var size = file.size;
        if ((size != null) && ((size / (9000 * 9000)) > 3)) {
            validasi('Ukuran maximum 1024px', 'warning');
            document.getElementById('GetFile1').value = null;
            return false;
        }

        var ext = fileName.match(/\.([^\.]+)$/)[1];
        ext = ext.toLowerCase();
        document.getElementById('outputImg1').src = window.URL.createObjectURL(file);
        return true;

    } else
        return false;
}

function VerifyFileNameAndFileSize2() {
    var file = document.getElementById('GetFile2').files[0];


    if (file != null) {
        var fileName = file.name;
        if (fileIsValid(fileName) == false) {
            validasi('Format bukan gambar!', 'warning');
            document.getElementById('GetFile2').value = null;
            return false;
        }
        var content;
        var size = file.size;
        if ((size != null) && ((size / (9000 * 9000)) > 3)) {
            validasi('Ukuran maximum 1024px', 'warning');
            document.getElementById('GetFile2').value = null;
            return false;
        }

        var ext = fileName.match(/\.([^\.]+)$/)[1];
        ext = ext.toLowerCase();
        document.getElementById('outputImg2').src = window.URL.createObjectURL(file);
        return true;

    } else
        return false;
}

function VerifyFileNameAndFileSize3() {
    var file = document.getElementById('GetFile3').files[0];


    if (file != null) {
        var fileName = file.name;
        if (fileIsValid(fileName) == false) {
            validasi('Format bukan gambar!', 'warning');
            document.getElementById('GetFile3').value = null;
            return false;
        }
        var content;
        var size = file.size;
        if ((size != null) && ((size / (9000 * 9000)) > 3)) {
            validasi('Ukuran maximum 1024px', 'warning');
            document.getElementById('GetFile3').value = null;
            return false;
        }

        var ext = fileName.match(/\.([^\.]+)$/)[1];
        ext = ext.toLowerCase();
        document.getElementById('outputImg3').src = window.URL.createObjectURL(file);
        return true;

    } else
        return false;
}

function VerifyFileNameAndFileSize4() {
    var file = document.getElementById('GetFile4').files[0];


    if (file != null) {
        var fileName = file.name;
        if (fileIsValid(fileName) == false) {
            validasi('Format bukan gambar!', 'warning');
            document.getElementById('GetFile4').value = null;
            return false;
        }
        var content;
        var size = file.size;
        if ((size != null) && ((size / (9000 * 9000)) > 3)) {
            validasi('Ukuran maximum 1024px', 'warning');
            document.getElementById('GetFile4').value = null;
            return false;
        }

        var ext = fileName.match(/\.([^\.]+)$/)[1];
        ext = ext.toLowerCase();
        document.getElementById('outputImg4').src = window.URL.createObjectURL(file);
        return true;

    } else
        return false;
}