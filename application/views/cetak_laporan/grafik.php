
<!--<div class="row" style="padding-top:2%">
    <div class="col-md-6 col-md-offset-3 text-center">
        <a href="<?php //echo site_url('Laporan/export_excel/' . $id_kelurahan)          ?>">
            <button class="btn btn-success"><i class="fa fa-file-excel-o"></i> Unduh Laporan Excel</button>
        </a>
    </div>
</div>-->
<div class="row" style="padding-top:2%">
    <?php if ($periode != null) { ?>
        <div class="col-md-12">
            <div id="line" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
        </div>
    <?php } ?>
    <div class="col-md-6">
        <div id="bar" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
    <div class="col-md-6">
        <div id="pie" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        Highcharts.chart('bar', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Bar <?= $judul ?>'
            },
            // subtitle: {
            //     text: 'Grafik Bar'
            // },
            colors: Highcharts.map(Highcharts.getOptions().colors, function(color) {
                return {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, color],
                        [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                    ]
                };
            }),
            xAxis: {
                categories: ['<?= $kategori ?>'],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total'
                },
                tickInterval: 1,
                minRange: 1,
                allowDecimals: false,
                startOnTick: true,
                endOnTick: true
                        // labels: {
                        //     format: '{value:.0f}'
                        // }
            },
            tooltip: {
                headerFormat: '<table style="font-size:12px;white-space: nowrap">' +
                        '<tr><td colspan="2" style="text-align:center; text-transform: uppercase;"><b>{point.key}</b></td></tr>',
                pointFormat: '<tr><td style="color:{series.color};padding:0"><b>{series.name} </b></td>' +
                        '<td style="padding:0"><b>: {point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [<?= $series ?>],
            credits: {
                enabled: false
            },
        });


        //     // Build the chart

        Highcharts.chart('pie', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Grafik Pie <?= $judul ?>'
            },
            // subtitle: {
            //     text: 'Grafik Pie'
            // },
            colors: Highcharts.map(Highcharts.getOptions().colors, function(color) {
                return {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, color],
                        [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                    ]
                };
            }),
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        },
                        connectorColor: 'silver'
                    }
                }
            },
            series: [{
                    name: 'Persentase',
                    data: [<?= $data_pie ?>]
                }],
            credits: {
                enabled: false
            },
        });

<?php if ($periode != null) { ?>
            Highcharts.chart('line', {
                chart: {
                    type: 'line',
                    marginTop: 80
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    shared: true,
                    crosshairs: true,
                    headerFormat: '<b>{point.key}</b><br>'
                },
                title: {
                    text: 'Grafik Line <?= $judul ?>'
                },
                subtitle: {
                    text: 'TAHUN <?= $tahun ?>'
                },
                xAxis: {
                    categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                        'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                    labels: {
                        rotation: 0,
                        align: 'right',
                        style: {
                            fontSize: '10px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Total'
                    },
                    tickInterval: 1,
                    minRange: 1,
                    allowDecimals: false,
                    startOnTick: true,
                    endOnTick: true
                            // labels: {
                            //     format: '{value:.0f}'
                            // }
                },
                legend: {
                    enabled: true
                },
                //                series: [{
                //                        "name": "pria",
                //                        "data": [240, 318, 291]
                //                    }, {
                //                        "name": "wanita",
                //                        "data": [229, 340, 337]
                //                    }]
                series: [<?= $line ?>]


            });
<?php } ?>

    });
</script>