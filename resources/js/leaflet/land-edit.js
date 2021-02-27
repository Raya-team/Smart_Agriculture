import 'leaflet';
import 'leaflet.fullscreen';
import '@geoman-io/leaflet-geoman-free';
import '@geoman-io/leaflet-geoman-free/dist/leaflet-geoman.css';
import L from "leaflet";


var geojson = document.getElementById('eventoutput').value;
var points = JSON.parse(geojson);
var lat = points[1].lat, lng = points[1].lng;
let map = L.map('mapid', {
    fullscreenControl: true,
}).setView([lat,lng], 12);
L.polygon([points]).addTo(map);

/*1:
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '<a href="https://rasm.io/company/14004709542/%D9%86%D8%A7%D9%87%DB%8C%D8%AF%20%D8%A2%D8%B3%D9%85%D8%A7%D9%86%20%D8%A7%DB%8C%D8%B1%D8%A7%D9%86%DB%8C%D8%A7%D9%86/">Aseman</a>'
}).addTo(map);*/
L.tileLayer('https://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png').addTo(map);
map.attributionControl.setPrefix('<a href="https://rasm.io/company/14004709542/%D9%86%D8%A7%D9%87%DB%8C%D8%AF%20%D8%A2%D8%B3%D9%85%D8%A7%D9%86%20%D8%A7%DB%8C%D8%B1%D8%A7%D9%86%DB%8C%D8%A7%D9%86/">ناهید آسمان گستران</a>');


map.pm.addControls({
    position: 'topleft',
    drawMarker :false,
    drawCircleMarker :false,
    drawPolygon :true,
    drawPolyline :false,
    drawRectangle :false,
    drawCircle: false,
    editMode : true,
    dragMode : false,
    cutPolygon :false,
    removalMode : true

});


const getLayer = () => {
    let findLayer=[];
    map.eachLayer(function (layer) {
        if (layer instanceof L.Path) {
            findLayer = layer._latlngs;
        }
    });
    return findLayer[0];
};

map.on('pm:globaleditmodetoggled', function() {
    let layer = getLayer();
    $('#eventoutput').val(JSON.stringify(layer));
});



map.pm.setLang('fa');