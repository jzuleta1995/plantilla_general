function mostrarModalPrestamo(id)
{
    var view_url = $("#hidden_view").val();

    $.ajax({
        url: view_url+'/'+id,
        type:"GET",
        success: function(result){
            $("#edit_id").val(result.id);
            $("#edit_cliente").val(result.cliente_nombre_completo);
        }
    });
}


function AnularPrestamo()
{
    var url = '/admin/prestamo/updateAnulaPrestamo';
    var id = $("#edit_id").val();

    $.ajax({
        url: url+'/'+id,
        type:"POST",
        data: {"id":$("#edit_id").val(), "observacion_prestamo":$("#edit_observacion").val(), "password":$("#password").val(), '_token': $("input[name=_token]").val()},

        success: function(result){
            alert(result.message);
            $("#editModal").modal('hide');
            //recarga lapagina despues de anular un registro
            location.reload(true);
        },
         error: function(data){
             alert(data.responseJSON.message);
             $('#password').val("").focus();
         }
    });
}

function limpiarCampos() {
    $("#edit_observacion").val("");
    $("#password").val("");
}