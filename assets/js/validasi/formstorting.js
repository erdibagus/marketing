function validateForm() {
    var keterangan = document.forms["myForm"]["keterangan"].value;

    if (keterangan == "") {
        validasi('Keterangan wajib di isi!', 'warning');
        return false;
    }

}