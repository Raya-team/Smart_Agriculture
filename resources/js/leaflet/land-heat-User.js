import L from 'leaflet';
import 'leaflet-webgl-heatmap/src/leaflet-webgl-heatmap';
import 'leaflet-webgl-heatmap/src/webgl-heatmap/webgl-heatmap';
import 'leaflet.fullscreen';
import 'leaflet-contextmenu';

var geojson = document.getElementById('eventoutput').value;
var points = JSON.parse(geojson);
var Center = L.polygon([points]).getBounds().getCenter();

let map = L.map('mapid', {
    // contextmenu: true,
    // contextmenuWidth: 140,
    // contextmenuItems: [{
    //     text: 'اینجا کجاست؟',
    //     callback: WhatHere,
    //     icon: "https://fastcode.space/wp-content/uploads/2019/11/Location-Icon-Creative-Design-Template.jpg"
    // }],
    fullscreenControl: true,
}).setView([Center['lat'],Center['lng']], 5);

map.flyToBounds(new L.polygon([points]).getBounds(), {'duration':3});

map.attributionControl.setPrefix('<a href="#">ناهید آسمان ایرانیان</a>');

L.tileLayer('https://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png').addTo(map);

function WhatHere(e) {
    alert(e.latlng);
}

setTimeout(()=>{
    L.polygon([points], {color: "#79acff"}).addTo(map);
}, 3000);

var colorsjson = document.getElementById('filters').value;
var colors = JSON.parse(colorsjson);

var detailjson = document.getElementById('details').value;
var details = JSON.parse(detailjson);


var shipLayer = L.layerGroup();
map.addLayer(shipLayer);


$("#filter_id").change(function () {
    shipLayer.clearLayers();
    var filters = $(this).find(':selected').val();
    var index = $(this).find(':selected').data('index');
    var colorSelected = JSON.stringify($(this).find(':selected').data('colors'));
    document.getElementById('colors').value = colorSelected;

    var max1 = $(this).find(':selected').data('max');
    var min1 = $(this).find(':selected').data('min');
    var max2 = 1;
    var min2 = 0;
    var datapoints = [];
    var sensorsPoints = [];

    for (var c = 0; c < colors.length; c++) {
        if (colors[c]['id'] == filters) {
            var color = (colors[c]['colors']);
            //convert string to array
            var test = JSON.parse(color);
            // console.log(test[2]);
        }

    }
    for (var d = 0; d < details.length; d++) {
        if (details[d]['filter_id'] == filters) {

            var loc = JSON.parse(details[d]['location']);
            var val1 = details[d]['value'];
            var sensor_id = details[d]['sensor_id'];

            var val2 = ((val1 - min1) / (max1 - min1)) * (max2 - min2) + min2;

            datapoints.push([loc[0]['lat'], loc[0]['lng'], val2]);
            sensorsPoints.push([loc[0]['lat'], loc[0]['lng'], val1, sensor_id]);
        }
    }

    var heatmap = L.webGLHeatmap({
        size: 5000,
        opacity: 1,
        gradientTexture: false,
        alphaRange: 1
    });
    heatmap.setData(datapoints);
    shipLayer.addLayer(heatmap);


    // Create Marker
    var icon = new L.Icon.Default();
    icon.options.shadowSize = [0, 0];

    function htmlPopUp(id, value, index) {
        return "<b style='text-align: center'>جزئیات سنسور</b><br>" +
            "" +
            "<div class='row' style='text-align: center'>"+
            // "<a href=" + id + " data-tooltip=\"tooltip\" title=\"نمودار\"><i class=\"fa fa-fw fa-line-chart\"></i></a>" +
            "<a href=" + id + " data-tooltip=\"tooltip\" title=\"نمودار\">نمایش نمودار</a>" +
            "</div>" +
            "<div class='row' style='text-align: center; direction: rtl'>"+
            "میزان : " + value + " " + index +
            "</div>"
            ;
    }

    for (var i = 0; i < sensorsPoints.length; i++) {
        var marker_points = [sensorsPoints[i][0], sensorsPoints[i][1]];
        var ValueOfSensor = sensorsPoints [i][2];
        var linkChartOfSensor = "https://techno-agric.ir/chart-user/" + sensorsPoints [i][3];
        shipLayer.addLayer(L.marker(marker_points, {icon: icon}).addTo(map)
            .bindPopup(
                htmlPopUp(linkChartOfSensor, ValueOfSensor, index)
            ));
    }

});



