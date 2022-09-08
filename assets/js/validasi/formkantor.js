function validateForm() {
    var kantor = document.forms["myForm"]["kantor"].value;

    if (kantor == "") {
        validasi('Nama Kantor wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var kantor = document.forms["myFormUpdate"]["kantor"].value;

    if (kantor == "") {
        validasi('Nama Kantor tidak boleh kosong!', 'warning');
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