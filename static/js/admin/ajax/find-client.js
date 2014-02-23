$('#lookup').click(function() {
  searchClients();
});

$("input").keypress(function(event) {
    if (event.which == 13 && $('.search-text').is(':focus')) {
      searchClients();
    }
});

$('#select-client').click(function() {
  if($('#select-form input:radio:checked').val()) {
    getClientByID($('#select-form input:radio:checked').val());
    $('#find-client').modal('hide');
  }
});

function searchClients() {
  clearServerError();
  $.post(
    "../ajax/admin/search/",
    {
      'csrf_test_name': $('input[name="csrf_test_name"]').val(),
      'last-name': $('input[name="last-name"]').val(),
      'first-name': $('input[name="first-name"]').val()
    }
  ).done(function (results) {
    $('.search-results').html(results);
  }).fail(function () {
    $('.lookup-error').html('<div class="alert alert-danger">Server Error</div>');
  });
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