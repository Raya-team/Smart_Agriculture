import Ch from 'highcharts';

var nickname, index, options, data, date, filter;
if (document.getElementById('data').value && document.getElementById('date').value && document.getElementById('filter_selected').value) {
    data = JSON.parse(document.getElementById('data').value);
    date = JSON.parse(document.getElementById('date').value);
    filter = JSON.parse(document.getElementById('filter_selected').value);
    nickname = filter.nickname;
    index = filter.index;
}


// Show Chart
if (data && date && filter){
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
                text: 'شاخص ' + nickname + ' ' + index,
            },
        },
        xAxis: {
            type: 'datetime',
            categories: date,
        },
        tooltip: {
            useHTML: true,
            split: true,
            valueSuffix: " " + index,
        },
        credits: {
            text: 'ناهید آسمان ایرانیان',
            href: '#'
        },
        // colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'],
        series: [{
            name: nickname,
            data: data,
            color: '#ED561B',
            marker: false,
            showInLegend: false,
            shadow: true
        }]
    };
    Ch.chart('highcharts', options);
}



