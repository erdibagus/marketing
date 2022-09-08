function validateForm() {
    var sumber = document.forms["myForm"]["sumber"].value;

    if (sumber == "") {
        validasi('Nama sumber wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var sumber = document.forms["myFormUpdate"]["sumber"].value;

    if (sumber == "") {
        validasi('Nama sumber tidak boleh kosong!', 'warning');
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