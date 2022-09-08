function validateForm() {
    var sistem_pinjam = document.forms["myForm"]["sistem_pinjam"].value;

    if (sistem_pinjam == "") {
        validasi('Nama Sistem Pinjam wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var sistem_pinjam = document.forms["myFormUpdate"]["sistem_pinjam"].value;

    if (sistem_pinjam == "") {
        validasi('Nama Sistem Pinjam tidak boleh kosong!', 'warning');
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