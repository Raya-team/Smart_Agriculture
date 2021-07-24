import L from 'leaflet';
import 'leaflet-measure-path/leaflet-measure-path'
import 'leaflet-contextmenu';
import 'leaflet.fullscreen';

import calc from '../../../node_modules/leaflet-measure/src/calc';

var geojson = document.getElementById('eventoutput').value;
var points = JSON.parse(geojson);
var Center = L.polygon([points]).getBounds().getCenter();
// console.log(points);
let map = L.map('mapid', {
    fullscreenControl: true,
}).setView([Center['lat'],Center['lng']], 5);


// (1) Zoom on Polygon
// Method 1
// var bounds = L.latLngBounds();
// bounds.extend(points);
// var t = map.fitBounds(bounds);
// Method 2
map.flyToBounds(new L.polygon([points]).getBounds(), {'duration':3});
// End (1)

map.attributionControl.setPrefix('<a href="#">ناهید آسمان ایرانیان</a>');

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


setTimeout(()=>{

    var polygon = L.polygon([points]).addTo(map)
        .showMeasurements();
    var calced = calc(points);
    console.log(calced);
    // var area = geojsonArea.geometry(y);
    // console.log(area);
}, 3000);

function showPolygonArea(e) {
    // console.log(e);
}