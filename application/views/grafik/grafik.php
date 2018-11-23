
<div class="row" style="padding-top:2%">
    <div class="col-md-6 col-md-offset-3 text-center">
        <a href="<?=site_url('Laporan/export_excel/'.$id_kelurahan)?>">
            <button class="btn btn-success"><i class="fa fa-file-excel-o"></i> Unduh Laporan Excel</button>
        </a>
    </div>
</div>
<div class="row" style="padding-top:2%">
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
                text: 'Grafik Bar Kondisi Infrastruktur'
            },
            // subtitle: {
            //     text: 'Grafik Bar'
            // },
            colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
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
                headerFormat: '<table style="font-size:12px;white-space: nowrap">'+
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
                text: 'Grafik Pie Kondisi Infrastruktur'
            },
            // subtitle: {
            //     text: 'Grafik Pie'
            // },
            colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
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
                data: [<?= $data_pie ?> ]
            }],
            credits: {
                enabled: false
            },
        });
    });
</script>