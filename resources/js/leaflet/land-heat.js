import L from 'leaflet';
import 'leaflet.heat/dist/leaflet-heat';
import 'leaflet.fullscreen';

var geojson = document.getElementById('eventoutput').value;
var points = JSON.parse(geojson);
var lat = points[0].lat, lng = points[0].lng;

let map = L.map('mapid', {
    fullscreenControl: true,
}).setView([lat,lng], 12);
L.polygon([points]).addTo(map);
map.attributionControl.setPrefix('<a href="#">ناهید آسمان ایرانیان</a>');

L.tileLayer('https://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png').addTo(map);


addressPoints = addressPoints.map(function (p) { return [p[0], p[1]]; });

var heat = L.heatLayer(addressPoints).addTo(map);
