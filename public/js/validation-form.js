$(function()
{
  $.validator.setDefaults({
    errorClass: 'invalid-feedback',
    highlight: function(element) {
      $(element)
        .closest('.form-group')
        .addClass('is-invalid');

    },
    unhighlight: function(element) {
      $(element)
        .closest('.form-group')
        .removeClass('is-invalid');
    }
  });
  $.validator.addMethod('strongPassword', function(value, element) {
   return this.optional(element)
     || value.length >= 6

 }, 'Votre mot de passe doit avoir au moins 6 charactères\'.');

  $("#formchangepw").validate({
    rules:
    {
      oldpasseword:
      {
        required: true
      },
      newpassword:
      {
        required: true,
        strongPassword: true
      },
      confirmenewpassword:
      {
        required: true,
        equalTo: '#newpassword'
      }
    },
    messages:
    {

    }
  });
  $("#formnotify").validate({
    rules:
    {
      idclient:
      {
        required: true,
        number: true
      },
      message:
      {
        required: true
      }
    }
  });
});
