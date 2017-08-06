function fun_edit(id)
{

    var view_url = $("#hidden_view").val();
    console.log(view_url);

    $.ajax({
        url: view_url+'/'+id,
        type:"GET",
        //data: {"id":id},
        success: function(result){
            //console.log(result);
            $("#edit_id").val(result.id);
            $("#edit_cliente").val(result.cliente_nombre_completo);
           // $("#edit_cliente").val(result.prestamo_valor);
            //$("#edit_Direccion").val(result.abono_observacion);
        }
    });
}


function fun_save()
{

    var url = '/admin/prestamo/updateAnulaPrestamo';
    $.ajax({
        url: url+'/'+$("#edit_id").val(),
        type:"POST",
        data: {"observacion_prestamo":$("#edit_observacion").val(), '_token': $("input[name=_token]").val()},
        success: function(result){
            //console.log(result);
            /* $("#edit_id").val(result.id);
             $("#edit_nombre").val(result.abono_valor_cuota);
             $("#edit_apellido").val(result.abono_valor);
             $("#edit_Direccion").val(result.abono_observacion); */
        }
    });
}