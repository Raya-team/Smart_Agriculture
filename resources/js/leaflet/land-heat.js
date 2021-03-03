import 'leaflet';
import 'leaflet-heatmap';

var map = L.map('mapid').setView([-37.82109, 175.2193], 16);

map.attributionControl.setPrefix('<a href="#">ناهید آسمان ایرانیان</a>');

var tiles = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

/*var heat = L.heatLayer([
    [50.5, 30.5, 0.2], // lat, lng, intensity
    [50.6, 30.4, 0.5],
], {radius: 25}).addTo(map);*/

var addressPoints = addressPoints.map(function (p) { return [p[0], p[1]]; });

console.log(addressPoints);

var heat = L.heatLayer(addressPoints).addTo(map),
    draw = true;

map.on({
    movestart: function () { draw = false; },
    moveend:   function () { draw = true; },
    mousemove: function (e) {
        if (draw) {
            heat.addLatLng(e.latlng);
        }
    }
});
