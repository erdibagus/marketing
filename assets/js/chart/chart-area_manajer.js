$(document).ready(function () {

    filterTahun();

});

function reset() {
    $("[name='user']").val("");
}

function filterTahun() {
    var tahun = $("[name='tahun']").val();
    var kpk = $("[name='kpk']").val();
    var user = $("[name='user']").val();
    if (tahun != '' && user != '' && kpk != '') {
        $("#chart").empty();
        $('#chart').append('<canvas id="myAreaChart"></canvas>');
        getUser();
    } else if (tahun != '' && user != '') {
        $("#chart").empty();
        $('#chart').append('<canvas id="myAreaChart"></canvas>');
        getUser();
    } else if (tahun != '' && kpk != '') {
        $("#chart").empty();
        $('#chart').append('<canvas id="myAreaChart"></canvas>');
        getKpk();
    }
}


// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function getUser() {
    var tahun = $('#tahun').val();
    var user = $('#user').val();
    var link = $('#baseurl').val();
    var base_url = link + 'home/getFilterTahunUser';
    $.ajax({
        type: 'POST',
        data: {
            tahun: tahun,
            user: user,
        },
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            grafik(
                hasil.prJanuari,
                hasil.prFebruari,
                hasil.prMaret,
                hasil.prApril,
                hasil.prMei,
                hasil.prJuni,
                hasil.prJuli,
                hasil.prAgustus,
                hasil.prSeptember,
                hasil.prOktober,
                hasil.prNovember,
                hasil.prDesember,
                hasil.suJanuari,
                hasil.suFebruari,
                hasil.suMaret,
                hasil.suApril,
                hasil.suMei,
                hasil.suJuni,
                hasil.suJuli,
                hasil.suAgustus,
                hasil.suSeptember,
                hasil.suOktober,
                hasil.suNovember,
                hasil.suDesember,
                hasil.peJanuari,
                hasil.peFebruari,
                hasil.peMaret,
                hasil.peApril,
                hasil.peMei,
                hasil.peJuni,
                hasil.peJuli,
                hasil.peAgustus,
                hasil.peSeptember,
                hasil.peOktober,
                hasil.peNovember,
                hasil.peDesember,
                hasil.tmJanuari,
                hasil.tmFebruari,
                hasil.tmMaret,
                hasil.tmApril,
                hasil.tmMei,
                hasil.tmJuni,
                hasil.tmJuli,
                hasil.tmAgustus,
                hasil.tmSeptember,
                hasil.tmOktober,
                hasil.tmNovember,
                hasil.tmDesember,
                hasil.ttJanuari,
                hasil.ttFebruari,
                hasil.ttMaret,
                hasil.ttApril,
                hasil.ttMei,
                hasil.ttJuni,
                hasil.ttJuli,
                hasil.ttAgustus,
                hasil.ttSeptember,
                hasil.ttOktober,
                hasil.ttNovember,
                hasil.ttDesember
            );
        }
    });

}

function getKpk() {
    var tahun = $('#tahun').val();
    var kpk = $('#kpk').val();
    var link = $('#baseurl').val();
    var base_url = link + 'home/getFilterTahunKpk';
    $.ajax({
        type: 'POST',
        data: {
            tahun: tahun,
            kpk: kpk,
        },
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            grafik(
                hasil.prJanuari,
                hasil.prFebruari,
                hasil.prMaret,
                hasil.prApril,
                hasil.prMei,
                hasil.prJuni,
                hasil.prJuli,
                hasil.prAgustus,
                hasil.prSeptember,
                hasil.prOktober,
                hasil.prNovember,
                hasil.prDesember,
                hasil.suJanuari,
                hasil.suFebruari,
                hasil.suMaret,
                hasil.suApril,
                hasil.suMei,
                hasil.suJuni,
                hasil.suJuli,
                hasil.suAgustus,
                hasil.suSeptember,
                hasil.suOktober,
                hasil.suNovember,
                hasil.suDesember,
                hasil.peJanuari,
                hasil.peFebruari,
                hasil.peMaret,
                hasil.peApril,
                hasil.peMei,
                hasil.peJuni,
                hasil.peJuli,
                hasil.peAgustus,
                hasil.peSeptember,
                hasil.peOktober,
                hasil.peNovember,
                hasil.peDesember,
                hasil.tmJanuari,
                hasil.tmFebruari,
                hasil.tmMaret,
                hasil.tmApril,
                hasil.tmMei,
                hasil.tmJuni,
                hasil.tmJuli,
                hasil.tmAgustus,
                hasil.tmSeptember,
                hasil.tmOktober,
                hasil.tmNovember,
                hasil.tmDesember,
                hasil.ttJanuari,
                hasil.ttFebruari,
                hasil.ttMaret,
                hasil.ttApril,
                hasil.ttMei,
                hasil.ttJuni,
                hasil.ttJuli,
                hasil.ttAgustus,
                hasil.ttSeptember,
                hasil.ttOktober,
                hasil.ttNovember,
                hasil.ttDesember
            );
        }
    });

}

function getTahun() {
    var tahun = $('#tahun').val();
    var link = $('#baseurl').val();
    var base_url = link + 'home/getFilterTahun';
    $.ajax({
        type: 'POST',
        data: {
            tahun: tahun,
        },
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            grafik(
                hasil.prJanuari,
                hasil.prFebruari,
                hasil.prMaret,
                hasil.prApril,
                hasil.prMei,
                hasil.prJuni,
                hasil.prJuli,
                hasil.prAgustus,
                hasil.prSeptember,
                hasil.prOktober,
                hasil.prNovember,
                hasil.prDesember,
                hasil.suJanuari,
                hasil.suFebruari,
                hasil.suMaret,
                hasil.suApril,
                hasil.suMei,
                hasil.suJuni,
                hasil.suJuli,
                hasil.suAgustus,
                hasil.suSeptember,
                hasil.suOktober,
                hasil.suNovember,
                hasil.suDesember,
                hasil.peJanuari,
                hasil.peFebruari,
                hasil.peMaret,
                hasil.peApril,
                hasil.peMei,
                hasil.peJuni,
                hasil.peJuli,
                hasil.peAgustus,
                hasil.peSeptember,
                hasil.peOktober,
                hasil.peNovember,
                hasil.peDesember,
                hasil.tmJanuari,
                hasil.tmFebruari,
                hasil.tmMaret,
                hasil.tmApril,
                hasil.tmMei,
                hasil.tmJuni,
                hasil.tmJuli,
                hasil.tmAgustus,
                hasil.tmSeptember,
                hasil.tmOktober,
                hasil.tmNovember,
                hasil.tmDesember,
                hasil.ttJanuari,
                hasil.ttFebruari,
                hasil.ttMaret,
                hasil.ttApril,
                hasil.ttMei,
                hasil.ttJuni,
                hasil.ttJuli,
                hasil.ttAgustus,
                hasil.ttSeptember,
                hasil.ttOktober,
                hasil.ttNovember,
                hasil.ttDesember
            );
        }
    });

}




function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}


function grafik(
    prJanuari, prFebruari, prMaret, prApril, prMei, prJuni,
    prJuli, prAgustus, prSeptember, prOktober, prNovember, prDesember,
    suJanuari, suFebruari, suMaret, suApril, suMei, suJuni,
    suJuli, suAgustus, suSeptember, suOktober, suNovember, suDesember,
    peJanuari, peFebruari, peMaret, peApril, peMei, peJuni,
    peJuli, peAgustus, peSeptember, peOktober, peNovember, peDesember,
    tmJanuari, tmFebruari, tmMaret, tmApril, tmMei, tmJuni,
    tmJuli, tmAgustus, tmSeptember, tmOktober, tmNovember, tmDesember,
    ttJanuari, ttFebruari, ttMaret, ttApril, ttMei, ttJuni,
    ttJuli, ttAgustus, ttSeptember, ttOktober, ttNovember, ttDesember
) {
    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [
                {
                    label: "Prospek",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "#3CB371",
                    pointRadius: 3,
                    pointBackgroundColor: "#3CB371",
                    pointBorderColor: "#3CB371",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [
                        prJanuari,
                        prFebruari,
                        prMaret,
                        prApril,
                        prMei,
                        prJuni,
                        prJuli,
                        prAgustus,
                        prSeptember,
                        prOktober,
                        prNovember,
                        prDesember,
                    ],
                },
                {
                    label: "Survey",
                    lineTension: 0.3,
                    backgroundColor: "rgba(231, 74, 59, 0.05)",
                    borderColor: "#FF0000",
                    pointRadius: 3,
                    pointBackgroundColor: "#FF0000",
                    pointBorderColor: "#FF0000",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "#5a5c69",
                    pointHoverBorderColor: "#5a5c69",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [
                        suJanuari,
                        suFebruari,
                        suMaret,
                        suApril,
                        suMei,
                        suJuni,
                        suJuli,
                        suAgustus,
                        suSeptember,
                        suOktober,
                        suNovember,
                        suDesember,
                    ],
                },
                {
                    label: "Penagihan",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "#87CEEB",
                    pointRadius: 3,
                    pointBackgroundColor: "#87CEEB",
                    pointBorderColor: "#87CEEB",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [
                        peJanuari,
                        peFebruari,
                        peMaret,
                        peApril,
                        peMei,
                        peJuni,
                        peJuli,
                        peAgustus,
                        peSeptember,
                        peOktober,
                        peNovember,
                        peDesember,
                    ],
                },
                {
                    label: "Telemarketing",
                    lineTension: 0.3,
                    backgroundColor: "rgba(231, 74, 59, 0.05)",
                    borderColor: "#FFA500",
                    pointRadius: 3,
                    pointBackgroundColor: "#FFA500",
                    pointBorderColor: "#FFA500",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "#5a5c69",
                    pointHoverBorderColor: "#5a5c69",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [
                        tmJanuari,
                        tmFebruari,
                        tmMaret,
                        tmApril,
                        tmMei,
                        tmJuni,
                        tmJuli,
                        tmAgustus,
                        tmSeptember,
                        tmOktober,
                        tmNovember,
                        tmDesember,
                    ],
                },
                {
                    label: "Teletagih",
                    lineTension: 0.3,
                    backgroundColor: "rgba(231, 74, 59, 0.05)",
                    borderColor: "#00008B",
                    pointRadius: 3,
                    pointBackgroundColor: "#00008B",
                    pointBorderColor: "#00008B",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "#5a5c69",
                    pointHoverBorderColor: "#5a5c69",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [
                        ttJanuari,
                        ttFebruari,
                        ttMaret,
                        ttApril,
                        ttMei,
                        ttJuni,
                        ttJuli,
                        ttAgustus,
                        ttSeptember,
                        ttOktober,
                        ttNovember,
                        ttDesember,
                    ],
                },
            ],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function (value, index, values) {
                            return number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: true
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function (tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });


    return myLineChart;

}