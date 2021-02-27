import L from 'leaflet';
import 'leaflet-measure';
import 'leaflet-measure/dist/leaflet-measure.fa'
import 'leaflet-contextmenu';
import 'leaflet.fullscreen';


var geojson = document.getElementById('eventoutput').value;
var points = JSON.parse(geojson);

var lat = points[0].lat, lng = points[0].lng;
let map = L.map('mapid', {
    fullscreenControl: true,
}).setView([lat,lng], 12);
map.attributionControl.setPrefix('<a href="http://blog.thematicmapping.org/">ناهید آسمان گستران</a>');

L.tileLayer('https://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png').addTo(map);

var Defaultmap = L.tileLayer('https://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png', {
    maxZoom: 17,
});

var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    maxZoom: 17,
});

var Thunderforest_SpinalMap = L.tileLayer('https://{s}.tile.thunderforest.com/spinal-map/{z}/{x}/{y}.png?apikey={apikey}', {
    apikey: '<your apikey>',
    maxZoom: 22
});

var GeoportailFrance_orthos = L.tileLayer('https://wxs.ign.fr/{apikey}/geoportail/wmts?REQUEST=GetTile&SERVICE=WMTS&VERSION=1.0.0&STYLE={style}&TILEMATRIXSET=PM&FORMAT={format}&LAYER=ORTHOIMAGERY.ORTHOPHOTOS&TILEMATRIX={z}&TILEROW={y}&TILECOL={x}', {
    bounds: [[-75, -180], [81, 180]],
    minZoom: 2,
    maxZoom: 19,
    apikey: 'choisirgeoportail',
    format: 'image/jpeg',
    style: 'normal'
});

var _baseLayers = {
    "پیش فرض": Defaultmap,
    "OpenTopoMap": OpenTopoMap,
    "Thunderforest_SpinalMap": Thunderforest_SpinalMap,
    "GeoportailFrance_orthos": GeoportailFrance_orthos
};

L.control.layers(_baseLayers, null, {position: "bottomright"}).addTo(map);


L.polygon([points]).addTo(map);
