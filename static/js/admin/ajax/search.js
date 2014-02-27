function searchClients() {
  clearServerError();
  return $.post(
    "../ajax/admin/search/",
    {
      'csrf_test_name': $('input[name="csrf_test_name"]').val(),
      'last-name': $('input[name="last-name"]').val(),
      'first-name': $('input[name="first-name"]').val()
    }
  ).promise();
}

function getClientByID(id) {
  clearServerError();
  $.post(
    "../ajax/admin/get-client/",
    {
      'csrf_test_name': $('input[name="csrf_test_name"]').val(),
      'UID': id
  }).done(function(results) {
    return $('.client-requesting').html(results);
  }).fail(function() {
    $('.lookup-error').html('<div class="alert alert-danger">Server Error</div>');
  });
}

function clearServerError() {
  $('.find-client-error').html('');
}