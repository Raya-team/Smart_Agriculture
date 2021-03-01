import L from 'leaflet';
import 'leaflet-measure/dist/leaflet-measure.fa'
import 'leaflet.fullscreen';

var map = L.map('mapid', {
    fullscreenControl: true,
}).setView([33.093382,52.811137], 5);

map.attributionControl.setPrefix('<a href="#">ناهید آسمان ایرانیان</a>');

L.tileLayer('https://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png').addTo(map);

var shipLayer = L.layerGroup();
map.addLayer(shipLayer);

$("#land_id").change(function () {
    shipLayer.clearLayers();
    var points = $(this).find(':selected').data('points');

    var lat = points[0].lat, lng = points[0].lng;
    map.flyTo(new L.LatLng(lat, lng), 12);

    shipLayer.addLayer(L.polygon([points]));
});


