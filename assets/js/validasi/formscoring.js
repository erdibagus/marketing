function validateForm() {
    var id_scoring = document.forms["myForm"]["id_scoring"].value;
    var nama_scoring = document.forms["myForm"]["nama_scoring"].value;
    var alamat = document.forms["myForm"]["alamat"].value;
    var kabupaten = document.forms["myForm"]["kabupaten"].value;
    var kecamatan = document.forms["myForm"]["kecamatan"].value;
    var desa = document.forms["myForm"]["desa"].value;
    var agunan = document.forms["myForm"]["agunan"].value;

    if (id_scoring == "") {
        validasi('No. PMP wajib di isi!', 'warning');
        return false;
    } else if (nama_scoring == '') {
        validasi('Nama wajib di isi!', 'warning');
        return false;
    } else if (alamat == '') {
        validasi('Alamat wajib di isi!', 'warning');
        return false;
    } else if (kabupaten == '') {
        validasi('Kabupaten wajib di isi!', 'warning');
        return false;
    } else if (kecamatan == '') {
        validasi('Kecamatan wajib di isi!', 'warning');
        return false;
    } else if (desa == '') {
        validasi('Desa wajib di isi!', 'warning');
        return false;
    } else if (agunan == '') {
        validasi('Agunan wajib di isi!', 'warning');
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
