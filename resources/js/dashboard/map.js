import L from 'leaflet';
import 'leaflet.fullscreen';

var map = L.map('world-map', {
    fullscreenControl: true,
}).setView([33.093382,52.811137], 4);

map.attributionControl.setPrefix('<a href="#">ناهید آسمان ایرانیان</a>');

L.tileLayer('https://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png').addTo(map);

var detailjson = document.getElementById('details').value;
var details = JSON.parse( detailjson);
var arr2 = [];
var datapoints =[];
var icon = new L.Icon.Default();

for(var d=0;d<details.length;d++)
{
    var loc=(details[d]['location']);
    var val1=(details[d]['value']);
    //convert string to array
    arr2.push(JSON.parse(loc));
    arr2.push(JSON.parse(val1));
}

for(var j=0;j<arr2.length/2;j++ )
{
    var data =[];
    data.push(arr2[2*j][0]['lat']);
    data.push(arr2[2*j][0]['lng']);
    data.push(arr2[2*j+1]);
    datapoints.push(data);
}


icon.options.shadowSize = [0,0];
// icon.options.iconSize = [50, 50];
for (var i = 0; i < datapoints.length; i++) {
    L.marker([datapoints[i][0],datapoints[i][1]], {icon : icon}).addTo(map);
}
