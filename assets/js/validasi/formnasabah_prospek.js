function validateForm() {
    var nama_nasabah_prospek = document.forms["myForm"]["nama_nasabah_prospek"].value;
    var alamat = document.forms["myForm"]["alamat"].value;
    var provinsi = document.forms["myForm"]["provinsi"].value;
    var kabupaten = document.forms["myForm"]["kabupaten"].value;
    var kecamatan = document.forms["myForm"]["kecamatan"].value;
    var desa = document.forms["myForm"]["desa"].value;
    var no_tlp = document.forms["myForm"]["no_tlp"].value;

    if (nama_nasabah_prospek == '') {
        validasi('Nama wajib di isi!', 'warning');
        return false;
    } else if (alamat == '') {
        validasi('Alamat wajib di isi!', 'warning');
        return false;
    } else if (provinsi == '') {
        validasi('Provinsi wajib di isi!', 'warning');
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
    } else if (no_tlp == '') {
        validasi('No Telepon wajib di isi!', 'warning');
        return false;
    } else if (no_tlp.length < 9) {
        validasi('Minimal 9 angka', 'warning');
        return false;
    } else if (no_tlp.length > 13) {
        validasi('Maksimal 13 angka', 'warning');
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
