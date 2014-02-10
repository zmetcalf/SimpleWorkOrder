$('#search-clients').click(function() {
  var jqxhr = $.post(
    "../admin/ajax/ajax_client/search_client",
    {
      'last-name': $('input[name="last-name"]').val(),
      'first-name': $('input[name="first-name"]').val()
    }
  ).done(function (results) {
    $('.search-results').html(results);
  }).fail(function () {

  });
});