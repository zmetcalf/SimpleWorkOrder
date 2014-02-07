var map = L.map('map').setView([39.737567,-104.984718], 10);

L.tileLayer('http://{s}.tile.cloudmade.com/74075466f76545c5b41ca1bc498e9adf/997/256/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
    maxZoom: 18
}).addTo(map);
