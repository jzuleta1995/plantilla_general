function mostrarModalAbono(id, abono_item, prestamo_id)
{

    var view_url = $("#hidden_view").val();

    $.ajax({
        url: view_url+'/'+id,
        type:"GET",
        data: {"prestamo_id":prestamo_id, "abono_item":abono_item},
        success: function(result){
            //console.log(result);
            $("#edit_id").val(result.id);
            $("#edit_abono_item").val(result.abono_item);
            $("#edit_prestamo_id").val(result.prestamo_id);
            $("#edit_valor_abono").val(result.abono_valor_cuota);
        }
    });
}


function AnularAbono()
{
    var url = '/admin/abono/updateAnulaAbono';
    var id = $("#edit_id").val();
    var prestamo_id = $("#edit_prestamo_id").val();

    $.ajax({
        url: url+'/'+id,
        type:"POST",
        data: {"id":$("#edit_id").val(), "abono_item":$("#edit_abono_item").val(), "prestamo_id":$("#edit_prestamo_id").val(), "observacion_abono":$("#edit_observacion").val(), "password":$("#password").val(), '_token': $("input[name=_token]").val()},

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