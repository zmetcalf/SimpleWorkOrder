function updateCenterpoint(centerpoint) {
  clearUpdateError();
  return $.post(
    "../../../ajax/set_geocode_centerpoint/",
    {
      'csrf_test_name': $('input[name="csrf_test_name"]').val(),
      'UID': $('#UID').val(),
      'centerpoint': centerpoint
    }
  ).promise();
}

function clearUpdateError() {
  $('.update-error').html('');
}
