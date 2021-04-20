import Ch from 'highcharts';


// var details = JSON.parse(document.getElementById('details').value);
var fitlers = JSON.parse(document.getElementById('fitlers').value);
console.log(fitlers);

// var nickname = [];


// for (var i = 0; i < fitlers.length; i++) {
//     nickname.push(fitlers[i]['nickname']);
// }




var options = {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'نمودار دما'
    },
    // subtitle: {
    //     text: 'Weekly temperature averages'
    // },
    yAxis: {
        title: {
            text: 'شاخص دما (°C)'
        }
    },
    xAxis: {
        type: 'Weeks',
        labels: [5, 3, 4, 7, 2,4,6,4,3,6,2,3,4,5]
    },
    tooltip: {
        split: true,
        valueDecimals: 0,
        valueSuffix: '°C'
    },
    credits: {
        text: 'ناهید آسمان ایرانیان',
        href: '#'
    },
    // colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'],
    series: [{
        name: 'دما',
        data: [
            [1 , 1],
            [2 , 6],
            [3 , 3],
            [4 , 8],
            [5 , 1],
            [6 , -8],
            [7 , 5],
        ],
        color: '#ED561B',
        marker: false,
        showInLegend: false,
    }]
};

function highlightPoint(event, point) {
    var chart = point.series.chart,
        hasVisibleSeries = chart.series.some(function (series) {
            return series.visible;
        });
    if (!point.isNull && hasVisibleSeries) {
        point.onMouseOver(); // Show the hover marker and tooltip
    } else {
        if (chart.tooltip) {
            chart.tooltip.hide(0);
        }
    }
}

// newseries = {
//     name: '',
//     data: []
// }
// var ab = [];
// for (var y = 0; y<fitlers.length ; y++ ){
//     var newseries = new Object();
//     newseries.name = fitlers[y]['nickname'];
//     for (var j = 0; j<fitlers[y]['details'].length ; j++ ){
//         ab.push(fitlers[y]['details'][j]);
//     }
//     newseries.data = ab;
//     options.series.push(newseries);
//     console.log(ab);
//     ab.splice([0]);
// }


Ch.chart('highcharts', options);




// Ch.chart('highcharts', {
//
//     title: {
//         text: 'Solar Employment Growth by Sector, 2010-2016'
//     },
//
//     subtitle: {
//         text: 'Source: thesolarfoundation.com'
//     },
//
//     yAxis: {
//         title: {
//             text: 'Number of Employees'
//         }
//     },
//
//     xAxis: {
//         accessibility: {
//             rangeDescription: 'Range: 2010 to 2017'
//         }
//     },
//
//     legend: {
//         layout: 'vertical',
//         align: 'right',
//         verticalAlign: 'middle'
//     },
//
//     plotOptions: {
//         series: {
//             label: {
//                 connectorAllowed: false
//             },
//             pointStart: 2010
//         }
//     },
//
//     series: [{
//         name: 'Installation',
//         data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
//     }, {
//         name: 'Manufacturing',
//         data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
//     }, {
//         name: 'Sales & Distribution',
//         data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
//     }, {
//         name: 'Project Development',
//         data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
//     }, {
//         name: 'Other',
//         data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
//     }],
//
//     responsive: {
//         rules: [{
//             condition: {
//                 maxWidth: 500
//             },
//             chartOptions: {
//                 legend: {
//                     layout: 'horizontal',
//                     align: 'center',
//                     verticalAlign: 'bottom'
//                 }
//             }
//         }]
//     }
//
// });