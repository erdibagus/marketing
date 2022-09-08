function validateForm() {
    var tahun = document.forms["myForm"]["tahun"].value;
    var bulan = document.forms["myForm"]["bulan"].value;
    var user = document.forms["myForm"]["user"].value;
    var file = document.forms["myForm"]["userfile"].value;

    if (tahun == "") {
        validasi('Tahun wajib di isi!', 'warning');
        return false;
    } else if (bulan == "") {
        validasi('Bulan wajib di isi!', 'warning');
        return false;
    } else if (user == "") {
        validasi('Marketing wajib di isi!', 'warning');
        return false;
    } else if (file == "") {
        validasi('Pilih file excel!', 'warning');
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