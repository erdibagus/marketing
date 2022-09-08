function validateForm() {
    var namaL = document.forms["myForm"]["namaL"].value;
    var user = document.forms["myForm"]["user"].value;
    var kantor = document.forms["myForm"]["kantor"].value;
    var divisi = document.forms["myForm"]["divisi"].value;
    var level = document.forms["myForm"]["level"].value;
    var pwd = document.forms["myForm"]["pwd"].value;
    var kpwd = document.forms["myForm"]["kpwd"].value;

    if (namaL == "") {
        validasi('Nama Lengkap wajib di isi!', 'warning');
        return false;
    } else if (user == '') {
        validasi('Username wajib di isi!', 'warning');
        return false;
    } else if (divisi == '') {
        validasi('Divisi wajib di isi!', 'warning');
        return false;
    } else if (kantor == '') {
        validasi('Kantor wajib di isi!', 'warning');
        return false;
    } else if (level == '') {
        validasi('Level wajib di isi!', 'warning');
        return false;
    } else if (pwd == '') {
        validasi('Password wajib di isi!', 'warning');
        return false;
    } else if (pwd !== '' || kpwd !== '') {
        if (pwd.length < 5) {
            validasi('Panjang Password minimal 5 karakter!', 'warning');
            return false;
        } else if (pwd !== kpwd) {
            validasi('Konfirmasi Password tidak sesuai!', 'warning');
            return false;
        }

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
        case 'pdf':

            break;
        default:
            this.value = '';
            isValid = false;
    }
    return isValid;
}

function VerifyFileNameAndFileSize() {
    var file = document.getElementById('GetFile').files[0];


    if (file != null) {
        var fileName = file.name;
        if (fileIsValid(fileName) == false) {
            validasi('Format bukan gambar!', 'warning');
            document.getElementById('GetFile').value = null;
            return false;
        }
        var content;
        var size = file.size;
        if ((size != null) && ((size / (9000 * 9000)) > 3)) {
            validasi('Ukuran maximum 1024px', 'warning');
            document.getElementById('GetFile').value = null;
            return false;
        }

        var ext = fileName.match(/\.([^\.]+)$/)[1];
        ext = ext.toLowerCase();

        if (ext == 'pdf') {
            $('#pdf').show();
            $('#img').hide();
            $(".custom-file-label").addClass("selected").html(file.name);
            document.getElementById('outputPdf').src = window.URL.createObjectURL(file);
        } else {
            $('#pdf').hide();
            $('#img').show();
            $(".custom-file-label").addClass("selected").html(file.name);
            document.getElementById('outputImg').src = window.URL.createObjectURL(file);
        }
        return true;

    } else
        return false;
}