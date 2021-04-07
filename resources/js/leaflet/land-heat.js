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

var dataPoints = [
    [36.3367, 59.593792, 1],
    [36.308209, 59.573879, 4],
    [36.252579, 59.609585,4],
    [36.286903, 59.683743,5],
    [36.294928, 59.616108,9],
    [36.32702, 59.66383,10],
 ];

var heat = L.heatLayer(dataPoints, {
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

for (var i = 0; i < dataPoints.length; i++) {
    L.marker([dataPoints[i][0],dataPoints[i][1]]).addTo(map);
}
