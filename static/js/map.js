var map = L.map('map').setView([39.737567,-104.984718], 10);

L.tileLayer('http://{s}.tile.cloudmade.com/74075466f76545c5b41ca1bc498e9adf/997/256/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
    maxZoom: 18
}).addTo(map);

var map_points = new Backbone.Collection();

map_points.on('add', function(marker) {
  var view = {
    limitLength: function() {
      return function(text, render) {
        return render(text).substr(0, 30) + '...';
      };
    },
    wo_url: 'dashboard/view-wo/' + marker.get('wo_uid'),
    job_type: marker.get('job_type'),
    additional_info: marker.get('wo_additional_info')
  };

  var pop_up = Mustache.render('<b><a href="{{wo_url}}">{{job_type}}</a></b><br />{{#additional_info}}{{#limitLength}}{{additional_info}}{{/limitLength}}{{/additional_info}}', view);

  var geocode = marker.get('geocode').split(",");
  var pointer = L.marker([geocode[0], geocode[1]]).addTo(map);
  pointer.bindPopup(pop_up);
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
