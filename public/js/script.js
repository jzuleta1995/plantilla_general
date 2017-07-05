$(document).ready(function(){
    //se oculta la caja de alerta
    $('#alert').hide();
    //se dectecta el boton eliminar
    $('.btn-delete').click(function(e){
        //para que la pagina no refresque y no actualice
        e.preventDefault();
        if( ! confirm("¿Esta seguro de Eliminar?")){
            return false;
        }
        //no se va a ejecutar
        //busca su padre que tiene  (tr) que contiene aal boton
        var row  = $(this).parents('tr');
        var form = $(this).parents('form');
        var url  = form.attr('action');

        $('#alert').show();

        $.post(url, form.serialize(), function(result){
            //oculta columna seleccionada
            row.fadeOut();
            $('#users-total').html(result.total);
            $('#alert').html(result.message);
        }).fail(function(){
            $('#alert').html('algo salio mal');
        });

    });


});