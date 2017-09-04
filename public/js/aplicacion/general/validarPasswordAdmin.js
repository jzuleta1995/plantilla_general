function validaPasswordAdmin(id)
{

    var url = '/admin/user/validaPasswordAdmin';

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