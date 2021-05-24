
  $(document).ready(function (){
  $('.checkbok_parent').on('click', function (){
    $(this).parents('.card-permission').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
  });
  $('.checkAll').on('click', function (){
  $(this).parents().find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
  });
});
