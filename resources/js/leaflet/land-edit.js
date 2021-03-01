import L from "leaflet";
import 'leaflet.fullscreen';
import 'leaflet-measure';
import 'leaflet-measure/dist/leaflet-measure.fa';
import '@geoman-io/leaflet-geoman-free';
import '@geoman-io/leaflet-geoman-free/dist/leaflet-geoman.css';


var geojson = document.getElementById('eventoutput').value;
var points = JSON.parse(geojson);
var lat = points[1].lat, lng = points[1].lng;

let map = L.map('mapid', {
    fullscreenControl: true,
}).setView([lat,lng], 12);

L.polygon([points],{
    color: '#9b2d14'
}).addTo(map);

L.tileLayer('https://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png').addTo(map);
map.attributionControl.setPrefix('<a href="#">ناهید آسمان گستران</a>');


map.pm.addControls({
    position: 'topleft',
    drawMarker :false,
    drawCircleMarker :false,
    drawPolygon :false,
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

map.on('pm:globaleditmodetoggled', function() {
    let layer = getLayer();
    $('#eventoutput').val(JSON.stringify(layer));
});

map.on('measurefinish', function (evt) {
    document.getElementById('eventoutput').value = JSON.stringify(evt.points);
});

map.pm.setLang('fa');