function validateForm() {
    var kolektabilitas = document.forms["myForm"]["kolektabilitas"].value;

    if (kolektabilitas == "") {
        validasi('Kolektabilitas wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var kolektabilitas = document.forms["myFormUpdate"]["kolektabilitas"].value;

    if (kolektabilitas == "") {
        validasi('Kolektabilitas tidak boleh kosong!', 'warning');
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