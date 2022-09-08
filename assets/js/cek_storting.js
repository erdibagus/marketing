function cek() {
    var tahun = $("[name='tahun']").val();
    var bulan = $("[name='bulan']").val();
    var user = $("[name='user']").val();
    if (tahun != '' && bulan != '' && user != '') {
        filter(tahun, bulan, user);
    } else {
        validasi("Isi semua bidang!", "warning");
    }
}

function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}

function filter(tahun, bulan, user) {
    var link = $('#baseurl').val();
    var base_url = link + 'storting/ajax_list_cek/' + tahun + '/' + bulan + '/' + user + '';


    var t = $('#tabel').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        lengthChange: false,

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url,
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            {
                "targets": [-1], //first column / numbering column
                "orderable": false, //set not orderable
            },
        ],

        "destroy": true

    });

    t.on('order.dt search.dt', function () {
        t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();


    $('.dataTables_length').addClass('bs-select');
}