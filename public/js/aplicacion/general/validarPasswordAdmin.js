function validaPasswordAdmin()
{
    var url = '/admin/user/validaPasswordAdmin';

    $.ajax({
        url: url,
        type:"GET",
        data: {"psw":$("#password").val(),'_token': $("input[name=_token]").val()},
        success: function(result){
            console.log(result);
            $("#edit_observacion").removeAttr("readonly");
            $("#edit_observacion").val('');

        },
         error: function(data){
             alert("El Password Validado es Incorrecto");
             $("#edit_observacion").addClass("readonly");
             $("#edit_observacion").val('');
             $("#password").val('');


         }
    });
}