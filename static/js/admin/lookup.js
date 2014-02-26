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

$('.lookup-type').change(function() {
  $('.person-group, .user-group, .wo-group').hide();
  if($('.lookup-type').val() == "Client") {
    $('.person-group').show();
  } else if($('.lookup-type').val() == "User") {
    $('.person-group, .user-group').show();
  } else if($('.lookup-type').val() == "Work Order") {
    $('.wo-group').show();
  }
});