import L from 'leaflet';
import 'leaflet.heat/dist/leaflet-heat';
import 'leaflet.fullscreen';
import 'leaflet-contextmenu';

var geojson = document.getElementById('eventoutput').value;
var points = JSON.parse(geojson);
var Center = L.polygon([points]).getBounds().getCenter();
let map = L.map('mapid', {
    contextmenu: true,
    contextmenuWidth: 140,
    contextmenuItems: [{
        text: 'اینجا کجاست؟',
        callback: WhatHere,
        icon: "https://fastcode.space/wp-content/uploads/2019/11/Location-Icon-Creative-Design-Template.jpg"
    }],
    fullscreenControl: true,
    //TODO lat_lng
}).setView([36.297418, 59.616795], 12);
map.attributionControl.setPrefix('<a href="#">ناهید آسمان ایرانیان</a>');
L.tileLayer('https://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png').addTo(map);
function WhatHere(e) {
    alert(e.latlng);
}
L.polygon([points],{color: "#79acff"}).addTo(map);

var detailjson = document.getElementById('details').value;
var details = JSON.parse( detailjson);
var datapoints = [];
for(var i=0;i<details.length;i++)
{
    var loc=(details[i]['location']);
    var val=(details[i]['value']);
    // console.log(val);
    //convert string to array
    datapoints.push(JSON.parse( loc));
    datapoints.push(JSON.parse( val));
}
// console.log(datapoints);
for(var j=0;j<details.length;j++ )
{
    var arr =[];
    for(var k=0;k<=2;k++)
    {
        console.log(datapoints);
        arr.push(datapoints[j][k]['lat']);
        arr.push(datapoints[j][k]['lng']);
        arr.push(datapoints[k]['val']);
    }
}
// console.log(datapoints[0][0]['lat']);

/*
var heat = L.heatLayer(datapoints,{
    radius: 20,
    blur: 5,
    maxZoom: 5,
    max: 100,

    gradient: {
        0.0: '#fff548',
        0.3: '#276300',
        0.6: '#9b3d11',
        1.0: '#ff0629'

    }
}).addTo(map);

for (var l = 0; l < dataPoints.length; l++) {
    L.marker([dataPoints[l][0],dataPoints[l][1]]).addTo(map);
}
*/
/*
var dataPoints = [
    [44.715026, -63.579426, 0.5],
    [44.678663, -63.612385, 0.67],
    [44.624686, -63.587666, 0.9999],
    [44.651559, -63.489819, 0.9],
    [44.697701, -63.494625, 0.7],
    [44.673292, -63.551617, 0.9],
];*/
