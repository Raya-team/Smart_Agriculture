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
}).setView([44.667505, -63.558414], 12);

L.polygon([points],{color: "#e0fff1"}).addTo(map);

map.attributionControl.setPrefix('<a href="#">ناهید آسمان ایرانیان</a>');

L.tileLayer('https://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png').addTo(map);

function WhatHere(e) {
    alert(e.latlng);
}

var dataPoints = [
    [44.715026, -63.579426, 0.5],
    [44.678663, -63.612385, 0.67],
    [44.624686, -63.587666, 0.9999],
    [44.651559, -63.489819, 0.9],
    [44.697701, -63.494625, 0.7],
    [44.673292, -63.551617, 0.9],
];

var heatmap = L.webGLHeatmap({size: 10000,opacity: 0.8});

heatmap.setData( dataPoints );

map.addLayer(heatmap);

for (var i = 0; i < dataPoints.length; i++) {
    marker = new L.marker([dataPoints[i][0],dataPoints[i][1]]).addTo(map);
}
