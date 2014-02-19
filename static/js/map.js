var map = L.map('map').setView([39.737567,-104.984718], 10);

L.tileLayer('http://{s}.tile.cloudmade.com/74075466f76545c5b41ca1bc498e9adf/997/256/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
    maxZoom: 18
}).addTo(map);

var map_points = new Backbone.Collection();

map_points.on('add', function(marker) {
  var test = map_points.find(function(wo) {
    if(wo.get('UID') == marker.get('UID') && wo !== marker){
      addAdditionalWOonPopup(wo, marker);
      return true;
    }
  });
  if(!test) {
    newPopup(marker);
  }
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

function newPopup(marker) {
  var geocode = marker.get('geocode').split(",");
  marker.set('pointer', L.marker([geocode[0], geocode[1]]).addTo(map));
  marker.get('pointer').bindPopup(generateWO(marker));
}

function addAdditionalWOonPopup(origin_wo, new_wo) {
  var origin_wo_string = origin_wo.get('pointer').getPopup().getContent();

  origin_wo.get('pointer').getPopup().setContent(origin_wo_string + '<br />' + generateWO(new_wo));
}

function generateWO(wo) {
  var view = {
    limitLength: function() {
      return function(text, render) {
        return render(text).substr(0, 30) + '...';
      };
    },
    wo_url: 'dashboard/view-wo/' + wo.get('wo_uid'),
    job_type: wo.get('job_type'),
    additional_info: wo.get('wo_additional_info')
  };

  return Mustache.render('<b><a href="{{wo_url}}">{{job_type}}</a></b><br />{{#additional_info}}{{#limitLength}}{{additional_info}}{{/limitLength}}{{/additional_info}}', view);
}
