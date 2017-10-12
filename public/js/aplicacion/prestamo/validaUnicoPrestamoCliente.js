/* funcion que sirve para validar que un cliente solo
   puede tener un prestamo en estado activo a la vez*/

function validaUnicoPrestamoCliente()
{

    var url = '/admin/prestamo/validaUnicoPrestamoCliente';

    $.ajax({
        url: url+'/'+$("#cliente_id").val(),
        type:"GET",
        data: {"id":$("#cliente_id").val()},
        success: function(result){
            //console.log(result);
            $("#cliente_id").val(result.id);
            $("#cliente").val(result.abono_valor_cuota);

            alert("El cliente Ya Posee Un Prestamo Activo");

        },
    });
}