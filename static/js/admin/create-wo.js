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