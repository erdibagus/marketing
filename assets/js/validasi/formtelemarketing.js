function validateForm() {
    var kategori = document.forms["myForm"]["kategori"].value;
    var sumber = document.forms["myForm"]["sumber"].value;
    var nama_nasabah = document.forms["myForm"]["nasabah_id"].value;
    var hasil = document.forms["myForm"]["hasil"].value;
    var usaha = document.forms["myForm"]["usaha"].value;
    var no_tlp = document.forms["myForm"]["no_tlp"].value;

    if (nama_nasabah == '') {
        validasi('Nasabah wajib di isi!', 'warning');
        return false;
    } else if (kategori == "") {
        validasi('Kategori wajib di isi!', 'warning');
        return false;
    } else if (sumber == '') {
        validasi('Sumber data wajib di isi!', 'warning');
        return false;
    } else if (usaha == '') {
        validasi('Usaha wajib di isi!', 'warning');
        return false;
    } else if (hasil == '') {
        validasi('Hasil wajib di isi!', 'warning');
        return false;
    } else if (no_tlp !== '') {
        if (no_tlp.length < 9) {
            validasi('Minimal 9 angka', 'warning');
            return false;
        } else if (no_tlp.length > 13) {
            validasi('Maksimal 13 angka', 'warning');
            return false;
        }

    }

}

function validateFormEdit() {
    var kategori = document.forms["myForm"]["kategori"].value;
    var sumber = document.forms["myForm"]["sumber"].value;
    var nama_nasabah = document.forms["myForm"]["nasabah_id"].value;
    var hasil = document.forms["myForm"]["hasil"].value;
    var usaha = document.forms["myForm"]["usaha"].value;

    if (nama_nasabah == '') {
        validasi('Nasabah wajib di isi!', 'warning');
        return false;
    } else if (kategori == "") {
        validasi('Kategori wajib di isi!', 'warning');
        return false;
    } else if (sumber == '') {
        validasi('Sumber data wajib di isi!', 'warning');
        return false;
    } else if (usaha == '') {
        validasi('Usaha wajib di isi!', 'warning');
        return false;
    } else if (hasil == '') {
        validasi('Hasil wajib di isi!', 'warning');
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