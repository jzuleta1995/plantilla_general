function mostrar(){
    $('#formulario_uno').style('display', 'block');
}

function ocultar(){
    $('#formulario_uno').style('display', 'none');
}

function limpiar() {
    $('#cliente').val("");
    $('#cobrador').val("");
    $('#cliente_id').val("");
    $('#cobrador_id').val("");
    $('#lugar_trabajo').val("");
    $('#tasa').val("");
    $('#fecha_inicial').val("");
    $('#fecha_final').val("");
}

$('#cliente').keyup(function () {
    if($('#cliente').val() == ""){
        $('#cliente_id').val("");
    }
});

$('#cobrador').keyup(function () {
    if($('#cobrador').val() == ""){
        $('#cobrador_id').val("");
    }
});

