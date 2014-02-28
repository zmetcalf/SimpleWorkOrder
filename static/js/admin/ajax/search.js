function searchClients() {
  clearServerError();
  return $.post(
    "../ajax/admin/search-clients/",
    {
      'csrf_test_name': $('input[name="csrf_test_name"]').val(),
      'last-name': $('input[name="last-name"]').val(),
      'first-name': $('input[name="first-name"]').val()
    }
  ).promise();
}

function searchUsers() {
  clearServerError();
  return $.post(
    "../ajax/admin/search-users/",
    {
      'csrf_test_name': $('input[name="csrf_test_name"]').val(),
      'last-name': $('input[name="last-name"]').val(),
      'first-name': $('input[name="first-name"]').val(),
      'username': $('input[name="username"]').val(),
      'email': $('input[name="email"]').val()
    }
  ).promise();
}

function searchWOs() {
  clearServerError();
  return $.post(
    "../ajax/admin/search-wos/",
    {
      'csrf_test_name': $('input[name="csrf_test_name"]').val(),
      'job-type': $('.job-type').val()
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