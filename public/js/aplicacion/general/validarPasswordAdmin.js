function validaPasswordAdmin()
{
    var url = '/admin/user/validaPasswordAdmin';

    $.ajax({
        url: url,
        type:"POST",
        data: {"psw":$("#password").val(),'_token': $("input[name=_token]").val()},
        success: function(result){
            $("#edit_observacion").prop("readonly", false);
            $("#edit_observacion").val('');
        },
         error: function(data){
             alert("El Password Validado es Incorrecto");
             $("#edit_observacion").prop("readonly", true);
             $("#edit_observacion").val('');
             $("#password").val('');
         }
    });
}