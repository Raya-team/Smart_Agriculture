import L from 'leaflet';
import 'leaflet.fullscreen';

var map = L.map('world-map', {
    fullscreenControl: true,
}).setView([33.093382,52.811137], 4);

map.attributionControl.setPrefix('<a href="#">ناهید آسمان ایرانیان</a>');

L.tileLayer('https://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png').addTo(map);



