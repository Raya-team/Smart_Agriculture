import L from "leaflet";
import 'leaflet.fullscreen';
import 'leaflet-measure';
import 'leaflet-measure/dist/leaflet-measure.fa';
import '@geoman-io/leaflet-geoman-free';
import '@geoman-io/leaflet-geoman-free/dist/leaflet-geoman.css';


var geojson = document.getElementById('eventoutput').value;
var points = JSON.parse(geojson);
var Center = L.polygon([points]).getBounds().getCenter();

let map = L.map('mapid', {
    fullscreenControl: true,
}).setView([Center['lat'],Center['lng']], 5);

// (1) Zoom on polygon
map.flyToBounds(new L.polygon([points]).getBounds(), {'duration':3});
// End (1)
setTimeout(()=>{
    L.polygon([points],{
        color: '#9b2d14'
    }).addTo(map);
}, 3000);


L.tileLayer('https://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png').addTo(map);
map.attributionControl.setPrefix('<a href="#">ناهید آسمان گستران</a>');


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

L.control.measure({
    activeColor: '#db4a29',
    completedColor: '#9b2d14',
    primaryLengthUnit: 'meters',
    secondaryLengthUnit: 'kilometers',
    primaryAreaUnit: 'sqmeters',
    localization: 'fa',
    popupOptions: {className: 'leaflet-measure-resultpopup', autoPanPadding: [10, 10]}
}).addTo(map);

$(".leaflet-control-measure").hover(
    function () {
        if (getLayer()) {
            $(".js-startprompt").hide();
            $(".leaflet-control-measure").append(
                "<p class='text-center p-2 h6' id='fullLand'><i class='fa fa-exclamation'></i>تنها یک مزرعه می توانید ثبت کنید</p>"
            );
        } else {
            if (!$('#eventoutput').value) {
                console.log('asdasd');
                $(".js-startprompt").show();
            }
        }
    },
    function () {
        if ($("#fullLand")) {
            $("#fullLand").remove();
        }
    }
);

const getLayer = () => {
    let findLayer=[];
    map.eachLayer(function (layer) {
        if (layer instanceof L.Path) {
            findLayer = layer._latlngs;
        }
    });
    return findLayer[0];
};

map.on('pm:globaleditmodetoggled', function(evt) {
    let layer = getLayer();
    $('#eventoutput').val(JSON.stringify(layer));
});

map.on('measurefinish', function (evt) {
    document.getElementById('eventoutput').value = JSON.stringify(evt.points);
});

map.pm.setLang('fa');

map.pm.setGlobalOptions({
    measurements: {
        measurement: true,
        area: true,
        displayFormat: 'metric'
    }
});