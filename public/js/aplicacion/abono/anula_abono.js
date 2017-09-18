function mostrarModalAbono(id)
{

    var view_url = $("#hidden_view").val();

    $.ajax({
        url: view_url+'/'+id,
        type:"GET",
        //data: {"id":id},
        success: function(result){
            //console.log(result);
            $("#edit_id").val(result.id);
            $("#edit_valor_abono").val(result.abono_valor_cuota);
        }
    });
}


function AnularAbono()
{
    var url = '/admin/abono/updateAnulaAbono';
    var id = $("#edit_id").val();

    $.ajax({
        url: url+'/'+id,
        type:"POST",
        data: {"id":$("#edit_id").val(), "observacion_abono":$("#edit_observacion").val(), '_token': $("input[name=_token]").val()},

        success: function(result){

            alert ("Abono Anulado Satisfactoriamente");

            $("#editModal").modal('hide');
            //console.log(result);
            //recarga lapagina despues de anular un registro
            location.reload(true);
        },
        error: function(data){
            alert("Debe Ingresar El Campo Observacion");
        }
    });
}