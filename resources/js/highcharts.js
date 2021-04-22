import Ch from 'highcharts';


var all_filters = JSON.parse(document.getElementById('filters').value);
var all_details = JSON.parse(document.getElementById('details').value);

var nickname,options,i;

$("#filter_id").change(function () {
    nickname = $(this).find(':selected').data('nickname');
    var filter_id = $(this).find(':selected').val();
    // console.log(filter_id);
    var data = [];

    for (i=0 ; i<all_details.length ; i++){
        if ( filter_id == all_details[i]['filter_id'] ){
            data.push([all_details[i]['created_at'], all_details[i]['value'] ]);
        }
    }

    console.log(data);

    options =  {
        chart: {
            type: 'spline'
        },
        title: {
            text: "نمودار" + " " + nickname
        },
        // subtitle: {
        //     text: 'Weekly temperature averages'
        // },
        yAxis: {
            title: {
                text: 'شاخص دما (°C)'
            },
        },
        xAxis: {
            type: 'years',
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
            data: data,
            color: '#ED561B',
            marker: false,
            showInLegend: false,
        }]
    };
    Ch.chart('highcharts', options);

});





































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


