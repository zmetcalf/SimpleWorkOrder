$('#reset-password').click(function() {
  $.post(
    ($('#base-url').val() + 'ajax/forgot_password/'),
    {
      'csrf_test_name': $('input[name="csrf_test_name"]').val(),
      'user_name': $('input[name="user_name"]').val(),
      'email': $('input[name="email"]').val()
    }
  ).done(function(response) {
    $('.login-errors').html('');
    $('.validation-errors').hide();
    if(response) {
      $('#forgot-password').modal('hide');
      $('.reset-success').html('<div class="alert alert-success">Password sent to your email address.</a>');
    } else {
      $('.response').html('<div class="alert alert-danger">Username or email is not valid.</div>')
    }
  }).fail(function() {
    $('.response').html('<div class="alert alert-danger">Server Error</div>')
  });
});
