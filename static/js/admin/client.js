var map = L.map('map').setView([39.737567,-104.984718], 10);

if($('#centerpoint').val()) {
  var geocode = $('#centerpoint').val().split(",");
  map.setView([geocode[0], geocode[1]], 12);
  L.marker([geocode[0], geocode[1]]).addTo(map);
}

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
    maxZoom: 18
}).addTo(map);