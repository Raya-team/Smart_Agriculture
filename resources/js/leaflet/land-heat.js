import L from 'leaflet';
import 'leaflet-webgl-heatmap/src/leaflet-webgl-heatmap';
import 'leaflet-webgl-heatmap/src/webgl-heatmap/webgl-heatmap';
import 'leaflet.fullscreen';
import 'leaflet-contextmenu';

var geojson = document.getElementById('eventoutput').value;
var points = JSON.parse(geojson);
var lat = points[0].lat, lng = points[0].lng;

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
}).setView([44.667505, -63.558414], 14);

L.polygon([points]).addTo(map);

map.attributionControl.setPrefix('<a href="#">ناهید آسمان ایرانیان</a>');

L.tileLayer('https://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png').addTo(map);

function WhatHere(e) {
    alert(e.latlng);
}

var dataPoints = [
    [44.6674, -63.5703, 0.8],
    [44.662841, -63.577935, 0.9],
    [44.672913, -63.542018, 0.4],
    [44.6826, -63.7552, 0.5],
    [44.6325, -63.5852, 0.9],
    [44.6467, -63.4696, 0.9],
    [44.6804, -63.487, 0.9],
    [44.6622, -63.5364, 0.9],
    [44.603, - 63.743, 0.9]
];

var heatmap = L.webGLHeatmap({size: 3000,opacity : 0.7});

heatmap.setData( dataPoints );

map.addLayer(heatmap);
