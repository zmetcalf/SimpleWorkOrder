if($('#map').length) {
  var map = L.map('map').setView([39.737567,-104.984718], 10);
  var pointer;

  if($('#centerpoint').val()) {
    updateMap($('#centerpoint').val());
  }

  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
      maxZoom: 18
  }).addTo(map);
}

$('#add-centerpoint').click(function() {
  var centerpoint = '';

  if($('.centerpoint').val()) {
    centerpoint = validateCenterpoint($('.centerpoint').val());
  } else if($('.latatude').val() && $('.longitude').val()) {
    centerpoint = validateCenterpoint($('.latatude').val() + ',' + $('.longitude').val());
  } else {
    $('.update-error').html('<div class="alert alert-danger">Please enter the correct values.</div>')
  }

  if(centerpoint) {
    updateCenterpoint(centerpoint).done(function() {
      $('.update-error').html('<div class="alert alert-success">Successfully updated map point.</div>');
      $('.not-mapped').hide();
      updateMap(centerpoint);
      setTimeout(function() {$('#modify-geocode').modal('hide')}, 1000);
    })
    .fail(function() {
      $('.update-error').html('<div class="alert alert-danger">Server Error</div>')
    });
  }
});

function validateCenterpoint(centerpoint) {
  try {
    var cp_array = centerpoint.replace(/ /g,'').split(',');
    if(!isNaN(cp_array[0]) && !isNaN(cp_array[1])) {
      return cp_array[0] + ',' + cp_array[1];
    }
  } catch (err) {
    console.log(err);
    $('.update-error').html('<div class="alert alert-danger">Please enter valid values.</div>')
  }
}

function updateMap(centerpoint) {
  var geocode = centerpoint.split(",");
  map.setView([geocode[0], geocode[1]], 12);
  if(pointer) {
    pointer.setLatLng([geocode[0], geocode[1]]);
    pointer.update();
  } else {
    pointer = L.marker([geocode[0], geocode[1]])
    pointer.addTo(map);
  }
}
