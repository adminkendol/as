/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
charts={
    pie:function(datas,dom,judul,pointer){
        Highcharts.chart(dom, {
                chart: {
                    type: 'pie',
                    /*backgroundColor:'grey',*/
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    }
                },
                title: {
                    text: judul,
                    /*style: {
                        color: '#FFF',
                        font: 'bold 16px "Trebuchet MS", Verdana, sans-serif'
                    }*/
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}'
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: pointer,
                    dataLabels: {
                        enabled: true,
                        /*color: '#FFFFFF'*/
                    },
                    data: datas
                }]
            });
    },
    line:function(datas,dom,judul,pointer,legend){
        console.log("INTEGER:"+datas.seriesJual);
        Highcharts.chart(dom, {
            chart: {
                type: 'line'
            },
            title: {
                text: judul
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
            xAxis: {
                categories: datas.labelsBeli
            },
            yAxis: {
                title: {
                    text: legend
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'Penjualan',
                data: datas.seriesJual
                }, {
                name: 'Pembelian',
                data: datas.seriesBeli
                }]
        });
    },
    bar:function(datas,dom,judul,pointer,legend){
        Highcharts.chart(dom, {
            chart: {
                type: 'bar'
            },
            title: {
                text: judul
            },
            xAxis: {
                categories: ['SMS', 'USSD', 'Android', 'Apple', 'Web']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total ads consumption'
                }
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: [{
                name: 'John',
                data: [5, 3, 4, 7, 2]
                }, {
                name: 'Jane',
                data: [2, 2, 3, 2, 1]
                }, {
                name: 'Joe',
                data: [3, 4, 4, 2, 5]
                }]
        });
    }
}

