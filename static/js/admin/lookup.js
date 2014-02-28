$('#lookup').click(function() {
  renderList(lookup());
});

$("input").keypress(function(event) {
    if (event.which == 13 && $('.search-text').is(':focus')) {
      renderList(lookup());
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

function lookup() {
  if($('.lookup-type').val() == 'Client') {
    return searchClients(); // js/admin/ajax/search.js
  } else if($('.lookup-type').val() == 'User') {
    return searchUsers(); // js/admin/ajax/search.js
  } else if($('.lookup-type').val() == 'Work Order') {
    return searchWOs(); // js/admin/ajax/search.js
  } else {
    $('.lookup-error').html('<div class="alert alert-danger">Page Error</div>');
    return false;
  }
}

function renderList(list_promise) {
  list_promise.done(function(list) {
    var template = '';

    if($('.lookup-type').val() == 'Client') {
      template = 'client-lookup-result-list.html';
    } else if($('.lookup-type').val() == 'User') {
      template = 'user-lookup-result-list.html';
    } else if($('.lookup-type').val() == 'Work Order') {
      template = 'wo-lookup-result-list.html';
    }

    if(list) {
      $.post(('../static/templates/admin/' + template), function(mustache_template) {
        var view = { 'result': list };
        $('.search-results').html(Mustache.render(mustache_template, view));
      });
    } else {
      $('.search-results').html("<div class='alert alert-danger'>No results found.</div>");
    }
  })
  .fail(function () {
    $('.lookup-error').html('<div class="alert alert-danger">Server Error</div>');
  });
}