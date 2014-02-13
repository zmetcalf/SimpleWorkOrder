var map = L.map('map').setView([39.737567,-104.984718], 10);

L.tileLayer('http://{s}.tile.cloudmade.com/74075466f76545c5b41ca1bc498e9adf/997/256/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
    maxZoom: 18
}).addTo(map);

var map_points = new Backbone.Collection();

map_points.on('add', function(marker) {
  var geocode = marker.attributes.geocode = marker.attributes.geocode.split(",");
  var pointer = marker.attributes.map_marker = L.marker([geocode[0], geocode[1]]).addTo(map);
  pointer.bindPopup('<b>' + marker.attributes.job_type + '</b>');
});

$.post('ajax/admin/get-open-wo',
  {
    'csrf_test_name': $('input[name="csrf_test_name"]').val()
  }
)
  .done(function(json_string) {
    _.each(json_string, function(json_el) {
      map_points.add(json_el);
    });
  })
  .fail(function() {
    alert("Please refresh page.");
});
