function cek() {
    var usercek = $("[name='usercek']").val();
    if (usercek != '') {
        filteruser(usercek);
    } else {
        validasi("Pilih Marketing!", "warning");
    }
}

function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}

function hapus_kosong() {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 1000,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "storting/hapus_data_kosong/";
                }
            );
        }
    });

}



function filteruser(usercek) {
    var link = $('#baseurl').val();
    var base_url = link + 'storting/ajax_list_user/' + usercek + '';


    var t = $('#dtHorizontalExample').DataTable({
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