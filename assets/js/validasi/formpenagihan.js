function validateForm() {
    var nasabah = document.forms["myForm"]["storting"].value;
    var keterangan = document.forms["myForm"]["keterangan"].value;
    var lokasi = document.forms["myForm"]["lokasi"].value;
    var lat = document.forms["myForm"]["lat"].value;
    var long = document.forms["myForm"]["long"].value;

    if (nasabah == '') {
        validasi('Nasabah wajib di isi!', 'warning');
        return false;
    } else if (keterangan == '') {
        validasi('Keterangan wajib di isi!', 'warning');
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