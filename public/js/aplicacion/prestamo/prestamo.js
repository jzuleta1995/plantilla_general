var Prestamo = {

    calculoValor: function () {

        $('#prestamo_valor,  #prestamo_tasa, #prestamo_numero_cuotas').focusout(function () {

            var valor           = 0
            var tasa            = 0;
            var cuotas          = 0;
            var total           = 0;
            var valor_cuota     = 0;
            var interes         = 0;
            var tipoPrestamo    = '';

            valor           = parseInt($('#prestamo_valor').val());
            tasa            = parseInt($('#prestamo_tasa').val());
            cuotas          = parseInt($('#prestamo_numero_cuotas').val());
            tipoPrestamo    = $('#prestamo_tipo').val();

            $('#prestamo_valor_abonado').val(0);

            if(valor >0 && tasa >0 && cuotas >0){
                interes     = Math.round(valor * tasa) / 100;
                total       = valor + interes;
                valor_cuota = Math.round(total / cuotas);

                if ($.isNumeric(total)) {
                    $('#prestamo_valor_total').val(total);
                    $('#prestamo_valor_actual').val(total);
                }

                if ($.isNumeric(valor_cuota)) {
                    $('#prestamo_valor_cuota').val(valor_cuota);
                    $('#prestamo_valor_proxima_cuota').val(valor_cuota);
                }

            }
        });
        
    },
    
    calculoFecha: function () {
        $('#prestamo_fecha, #prestamo_tiempo_cobro').focusout(function (){
            var cantidad_dias       = 0;
            var tiempo_prestamo     = '';
            var fecha               = '';
            var fecha_actual        = '';
            var fecha_pago          = '';

            fecha            = new Date($('#prestamo_fecha').val());
            tiempo_prestamo  = $('#prestamo_tiempo_cobro').val();
            fecha_actual     = new Date(fecha.setDate(fecha.getDate() + 1));

            if (tiempo_prestamo =='DIARIO'){
                fecha_pago = new Date(fecha.setDate(fecha_actual.getDate() + 1));
            }else if(tiempo_prestamo =='SEMANAL'){
                fecha_pago = new Date(fecha.setDate(fecha_actual.getDate() + 8));
            }else if(tiempo_prestamo =='QUINCENAL'){
                fecha_pago = new Date(fecha.setDate(fecha_actual.getDate() + 15));
            }else if(tiempo_prestamo =='MENSUAL'){
                fecha_pago = new Date(fecha.setDate(fecha_actual.getDate() + 30));
            }

            var dia  = fecha_pago.getDate();
            var mes  = fecha_pago.getMonth() + 1;
            var anio = fecha_pago.getFullYear();

            if(dia < 10){
                dia = "0" + dia;
            }

            if(mes < 10){
                mes = "0" + mes;
            }

            fecha_pago = anio + "-" + mes + "-" + dia;

            if(dia && mes && anio){
                $('#prestamo_fecha_inicial').val($('#prestamo_fecha').val());
                $('#prestamo_fecha_proximo_cobro').val(fecha_pago);
            }
        });
    }
}

$(document).ready(function () {
    Prestamo.calculoValor();
    Prestamo.calculoFecha();
})