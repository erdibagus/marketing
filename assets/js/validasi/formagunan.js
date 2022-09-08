function validateForm() {
    var agunan = document.forms["myForm"]["agunan"].value;

    if (agunan == "") {
        validasi('Nama Agunan wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var agunan = document.forms["myFormUpdate"]["agunan"].value;

    if (agunan == "") {
        validasi('Nama Agunan tidak boleh kosong!', 'warning');
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