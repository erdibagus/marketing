function filter() {
    var tglawal = $("[name='tglawal']").val();
    var tglakhir = $("[name='tglakhir']").val();
    var user = $("[name='user']").val();
    var kantor = $("[name='kantor']").val();
    if (tglawal != '' && tglakhir != '' && user != '' && kantor != '') {
        filtertgluserkantor(tglawal, tglakhir, user, kantor);
    } else if (tglawal != '' && tglakhir != '' && user != '') {
        filtertgluser(tglawal, tglakhir, user);
    } else if (tglawal != '' && tglakhir != '' && kantor != '') {
        filtertglkantor(tglawal, tglakhir, kantor);
    } else if (tglawal != '' && tglakhir != '') {
        filtertgl(tglawal, tglakhir);
    } else if (user != '') {
        validasi("Tanggal Filter wajib di isi!", "warning");
    } else if (kantor != '') {
        validasi("Tanggal Filter wajib di isi!", "warning");
    } else {
        validasi("Tanggal Filter wajib di isi!", "warning");
    }
}

function filtermanajer() {
    var tglawal = $("[name='tglawalmanajer']").val();
    var tglakhir = $("[name='tglakhirmanajer']").val();
    var user = $("[name='usermanajer']").val();
    if (tglawal != '' && tglakhir != '' && user != '') {
        filtertgluser(tglawal, tglakhir, user);
    } else if (tglawal != '' && tglakhir != '') {
        filtertglmanajer(tglawal, tglakhir);
    } else if (user != '') {
        validasi("Tanggal Filter wajib di isi!", "warning");
    } else {
        validasi("Tanggal Filter wajib di isi!", "warning");
    }
}

function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}

function refresh() {
    var t = $('#dtHorizontalExample').DataTable();
    t.ajax.reload();
}

function reset() {
    $("[name='tglawal']").val("");
    $("[name='tglakhir']").val("");
    $("[name='user']").val("");
    $("[name='kantor']").val("");
}

function resetmanajer() {
    $("[name='tglawalmanajer']").val("");
    $("[name='tglakhirmanajer']").val("");
    $("[name='usermanajer']").val("");
}

function filtertgluserkantor(tglawal, tglakhir, user, kantor) {
    var link = $('#baseurl').val();
    var base_url = link + 'penagihan/filtertgluserkantor/' + tglawal + '/' + tglakhir + '/' + user + '/' + kantor + '';


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

function filtertgluser(tglawal, tglakhir, user) {
    var link = $('#baseurl').val();
    var base_url = link + 'penagihan/filtertgluser/' + tglawal + '/' + tglakhir + '/' + user + '';


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

    var t = $('#dtHorizontalExamplemanajer').DataTable({
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

function filtertglkantor(tglawal, tglakhir, kantor) {
    var link = $('#baseurl').val();
    var base_url = link + 'penagihan/filtertglkantor/' + tglawal + '/' + tglakhir + '/' + kantor + '';


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

function filtertgl(tglawal, tglakhir) {
    var link = $('#baseurl').val();
    var base_url = link + 'penagihan/filtertgl/' + tglawal + '/' + tglakhir + '';


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

function filtertglmanajer(tglawal, tglakhir) {
    var link = $('#baseurl').val();
    var base_url = link + 'penagihan/filtertglmanajer/' + tglawal + '/' + tglakhir + '';


    var t = $('#dtHorizontalExamplemanajer').DataTable({
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