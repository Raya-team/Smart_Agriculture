import L from 'leaflet';
import 'leaflet-webgl-heatmap/src/leaflet-webgl-heatmap';
import 'leaflet-webgl-heatmap/src/webgl-heatmap/webgl-heatmap';
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

var detailjson = document.getElementById('details').value;
var details = JSON.parse( detailjson);
// console.log(details);

var shipLayer = L.layerGroup();
map.addLayer(shipLayer);
// var x = new nukeVendorPrefix();
// console.log(x);

$("#filter_id").change(function () {
    shipLayer.clearLayers();

    var filters = $(this).find(':selected').val();
    var max1 = $(this).find(':selected').data('max');
    var min1 = $(this).find(':selected').data('min');
    var max2 = 1;
    var min2 = 0;
    var arr = [];

    for(var d=0;d<details.length;d++)
    {
        if(details[d]['filter_id'] == filters)
        {
            var loc=(details[d]['location']);
            var val1=(details[d]['value']);
            var val2 = ((val1 - min1) / (max1 - min1)) * (max2 - min2) + min2;
            console.log(val2);
            //convert string to array
            arr.push(JSON.parse(loc));
            arr.push(JSON.parse(val2));
        }

    }
    var datapoints =[];
    var sensorsPoints = [];
    for(var j=0;j<arr.length/2;j++ )
    {
        var data =[];
        data.push(arr[2*j][0]['lat']);
        data.push(arr[2*j][0]['lng']);
        data.push(arr[2*j+1]);
        datapoints.push(data);
    }
    var heatmap = L.webGLHeatmap({
        size: 2000,
        opacity: 0.8,
        gradientTexture: false,
        alphaRange : 1});
    heatmap.setData( datapoints );
    shipLayer.addLayer(heatmap);


    // Create Marker

    var PopupCode = "<b style='text-align: center'>جزئیات سنسور</b><br>" +
        "" +
        "<a href='#' style=''>نمودار</a>";

    var icon = new L.Icon.Default();
    icon.options.shadowSize = [0,0];
    for (var i = 0; i < datapoints.length; i++) {
        shipLayer.addLayer(L.marker([datapoints[i][0],datapoints[i][1]], {icon : icon}).addTo(map)
            .bindPopup(PopupCode));
    }
});



