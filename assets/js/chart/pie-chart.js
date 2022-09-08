$(document).ready(function () {

    getTahunPie();

});

function resetPie() {
    $("[name='userpie']").val("");
    $("[name='kpkpie']").val("");
}

function filterTahunPie() {
    var tahun = $("[name='tahunpie']").val();
    var kpk = $("[name='kpkpie']").val();
    var user = $("[name='userpie']").val();
    if (tahun != '' && user != '' && kpk != '') {
        validasi("Pilih User atau KPK saja", "warning");
    } else if (tahun != '' && user != '') {
        $("#chartpie").empty();
        $('#chartpie').append('<canvas id="myPieChart"></canvas>');
        getUserPie();
    } else if (tahun != '' && kpk != '') {
        $("#chartpie").empty();
        $('#chartpie').append('<canvas id="myPieChart"></canvas>');
        getKpkPie();
    } else if (tahun != '') {
        $("#chartpie").empty();
        $('#chartpie').append('<canvas id="myPieChart"></canvas>');
        getTahunPie();
    }
}


// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';


function getTahunPie() {
    var tahunpie = $('#tahunpie').val();
    var link = $('#baseurl').val();
    var base_url = link + 'home/getTotalTransaksi';
    $.ajax({
        type: 'POST',
        data: {
            tahunpie: tahunpie,
        },
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#pr').text(hasil.jmlpr);
            $('#su').text(hasil.jmlsu);
            $('#pe').text(hasil.jmlpe);
            $('#tm').text(hasil.jmltm);
            $('#tt').text(hasil.jmltt);
            grafikPie(
                hasil.jmlpr,
                hasil.jmlsu,
                hasil.jmlpe,
                hasil.jmltm,
                hasil.jmltt
            );
        }
    });

}

function getUserPie() {
    var tahunpie = $('#tahunpie').val();
    var userpie = $('#userpie').val();
    var link = $('#baseurl').val();
    var base_url = link + 'home/getTotalTransaksiUser';
    $.ajax({
        type: 'POST',
        data: {
            tahunpie: tahunpie,
            userpie: userpie,
        },
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#pr').text(hasil.jmlpr);
            $('#su').text(hasil.jmlsu);
            $('#pe').text(hasil.jmlpe);
            $('#tm').text(hasil.jmltm);
            $('#tt').text(hasil.jmltt);
            grafikPie(
                hasil.jmlpr,
                hasil.jmlsu,
                hasil.jmlpe,
                hasil.jmltm,
                hasil.jmltt
            );
        }
    });

}

function getKpkPie() {
    var tahunpie = $('#tahunpie').val();
    var kpkpie = $('#kpkpie').val();
    var link = $('#baseurl').val();
    var base_url = link + 'home/getTotalTransaksiKpk';
    $.ajax({
        type: 'POST',
        data: {
            tahunpie: tahunpie,
            kpkpie: kpkpie,
        },
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#pr').text(hasil.jmlpr);
            $('#su').text(hasil.jmlsu);
            $('#pe').text(hasil.jmlpe);
            $('#tm').text(hasil.jmltm);
            $('#tt').text(hasil.jmltt);
            grafikPie(
                hasil.jmlpr,
                hasil.jmlsu,
                hasil.jmlpe,
                hasil.jmltm,
                hasil.jmltt
            );
        }
    });

}

function grafikPie(pr, su, pe, tm, tt) {

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Prospek", "Survey", "Penagihan", "Telemarketing", "Teletagih"],
            datasets: [{
                data: [pr, su, pe, tm, tt],
                backgroundColor: ['#3CB371', '#FF0000', '#87CEEB', '#FFA500', '#00008B'],
                hoverBackgroundColor: ['#008080', '#008080', '#008080', '#008080', '#008080'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });

    return myPieChart;

}