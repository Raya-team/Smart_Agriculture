import L from 'leaflet';
import 'leaflet-measure';
import 'leaflet-measure/dist/leaflet-measure.fa'
import 'leaflet-contextmenu';
import 'leaflet.fullscreen';

let map = L.map('mapid', {
    contextmenu: true,
    contextmenuWidth: 140,
    contextmenuItems: [{
        text: 'اینجا کجاست؟',
        callback: WhatHere,
        icon: "https://fastcode.space/wp-content/uploads/2019/11/Location-Icon-Creative-Design-Template.jpg"
    },
        {
            text: "بزرگنمایی",
            callback: Zoomin,
            index: 0,
            icon: 'https://image.flaticon.com/icons/png/512/545/545651.png',

        },
        {
            text: "کوچکنمایی",
            callback: Zoomout,
            index: 1,
            icon: 'data:image/png;base64,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'
        }],

    fullscreenControl: true,
    // fullscreenControlOptions: {
    //     position: 'bottomleft'
    // }
}).setView([36.29813761025315, 59.60592779759344], 12);
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
var measureControl = L.control.measure({
    activeColor: '#db4a29',
    completedColor: '#9b2d14',
    primaryLengthUnit: 'meters',
    secondaryLengthUnit: 'kilometers',
    localization: 'fa',
    popupOptions: {className: 'leaflet-measure-resultpopup', autoPanPadding: [10, 10]}
}).addTo(map);

$(".leaflet-control-measure").hover(
    function () {
        if (renderMeasure()) {
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

const renderMeasure = () => {
    let measures = [];
    map.eachLayer(function (Layer) {
        if (Layer instanceof L.Path) {
            measures.push(Layer._latlngs);
        }
    });
    return measures.length;
};

map.on('measurestart', function () {
});

map.on('measurefinish', function (evt) {
    document.getElementById('eventoutput').value = JSON.stringify(evt.points);
});


function WhatHere(e) {
    alert(e.latlng);
}

function Zoomin(e) {
    map.zoomIn();
}

function Zoomout(e) {
    map.zoomOut();
}