function validateForm() {
    var divisi = document.forms["myForm"]["divisi"].value;

    if (divisi == "") {
        validasi('Nama Divisi wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var divisi = document.forms["myFormUpdate"]["divisi"].value;

    if (divisi == "") {
        validasi('Nama Divisi tidak boleh kosong!', 'warning');
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