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
}).setView([44.667505, -63.558414], 12);

map.attributionControl.setPrefix('<a href="#">ناهید آسمان ایرانیان</a>');

L.tileLayer('https://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png').addTo(map);

function WhatHere(e) {
    alert(e.latlng);
}

L.polygon([points],{color: "#4d86ff"}).addTo(map);

var dataPoints = [
    [44.715026, -63.579426, 20],
    [44.678663, -63.612385, 40],
    [44.624686, -63.587666,60],
    [44.697701, -63.494625, 80],
    [44.673292, -63.551617, 100],
    [44.678419, -63.518642, 200],

];

var heat = L.heatLayer(dataPoints, {
    radius: 20,
    blur: 15,
    maxZoom: 10,
    max: 100,
    gradient: {
        0.1: 'yellow',
        0.2: 'yellow',
        0.3: 'yellow',
        0.4: 'yellow',
        0.5: 'yellow',
        0.6: 'yellow',
        0.7: 'yellow',
        0.8: 'black',
        0.9: 'black',
        1.0: 'red'
    }
}).addTo(map);
