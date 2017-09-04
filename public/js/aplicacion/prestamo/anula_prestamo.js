function mostrarModalPrestamo(id)
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
           }
    });
}


function AnularPrestamo()
{
    var url = '/admin/prestamo/updateAnulaPrestamo';
    $.ajax({
        url: url+'/'+$("#edit_id").val(),
        type:"POST",
        data: {"observacion_prestamo":$("#edit_observacion").val(), '_token': $("input[name=_token]").val()},
        success: function(result){
            alert ("Prestamo Anulado Satisfactoriamente");

            $("#editModal").modal('hide');
            console.log(result);
        }
    });
}