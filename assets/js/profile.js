$(document).ready(function () {
    ambilData();
});

function ambilData() {
    var id = $("[name='iduser']").val();
    var link = $('#baseurl').val();
    var base_url = link + 'profile/detail_data';
    var link_gambar = link + 'assets/upload/pengguna/';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $("#namaL").text(hasil[0].nama);
            $("#divisi").text(hasil[0].nama_divisi);
            $("#kantor").text(hasil[0].nama_kantor);
            document.getElementById('outputImg').src = link_gambar + hasil[0].foto;
        }
    });
}


function pesan(judul, deskripsi, status) {
    swal.fire({
        title: judul,
        text: deskripsi,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}