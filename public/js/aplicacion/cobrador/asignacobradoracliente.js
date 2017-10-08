$("#checkbox_all").click(function () {
    $("input:checkbox").prop('checked', $(this).prop('checked'));
});

$(document).ready(function() {
    if($('#cobrador_quitar_cliente').val() != ""){
        $('#visor_clientes').removeClass('hidden');
    }else{
        $('#visor_clientes').addClass('hidden');
    }

    $("#btn_cliente").click(function () {

        var codigos = "";

        $("input:checkbox:checked").each(

            function() {
                codigos = codigos  + $(this).val() + ",";
                $('#datos').val(codigos);
            }
        );
    })

    $('#btnCargarClientes').click(function(){
        if($('#cobrador_quitar_cliente').val() != ""){
            $('#visor_clientes').removeClass('hidden');
        }
    });
});
