$('#lookup').click(function() {
  renderClients();
});

$("input").keypress(function(event) {
    if (event.which == 13 && $('.search-text').is(':focus')) {
      renderClients();
    }
});

$('#select-client').click(function() {
  if($('#select-form input:radio:checked').val()) {
    getClientByID($('#select-form input:radio:checked').val());
    $('#find-client').modal('hide');
  }
});

if($('#client-uid').length) {
  getClientByID($('#client-uid').val());
}

$('.job_type').val($('.hidden-job-type').val());

function renderClients() {
  searchClients().done(function(client_list) {
    if(client_list) {
      $.post(($('#base-url').val() + "static/templates/admin/view-client.html"),
        function(mustache_template) {
          var view = { 'result': client_list };
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