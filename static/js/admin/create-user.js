$('.collapse').collapse();

$('.specialty').val($('.hidden-specialty').val());

if($('.hidden-user-type').val()) {
  $('.user_type').val($('.hidden-user-type').val());
}