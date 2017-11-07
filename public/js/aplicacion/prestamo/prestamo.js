var Prestamo = {

    calculoValor: function () {

        $('#prestamo_valor,  #prestamo_tasa, #prestamo_numero_cuotas').focusout(function () {

            var valor            = 0
            var tasa             = 0;
            var cuotas           = 0;
            var total            = 0;
            var valor_cuota      = 0;
            var interes          = 0;
            var interes_cabierto = 0;
            var tipoPrestamo     = '';
            var tiempoPrestamo   = '';


            tipoPrestamo    = $('#prestamo_tipo').val();
            tiempoPrestamo  = $('#prestamo_tiempo_cobro').val();


            if (tipoPrestamo == 'ABIERTO') {
                if (tiempoPrestamo == 'SEMANAL') {
                    $('#prestamo_numero_cuotas').val(4);
                } else if (tiempoPrestamo == 'QUINCENAL') {
                    $('#prestamo_numero_cuotas').val(2);
                } else if (tiempoPrestamo == 'MENSUAL') {
                    $('#prestamo_numero_cuotas').val(1);
                }
            }

            valor           = parseFloat($('#prestamo_valor').val().replace(/\./g,''));
            tasa            = parseFloat($('#prestamo_tasa').val());
            cuotas          = parseFloat($('#prestamo_numero_cuotas').val().replace(/\./g,''));

            $('#prestamo_valor_abonado').val(0);

            if(valor >0 && tasa >0 && cuotas >0){
                interes           = parseFloat(Math.round(valor * tasa) / 100);
                interes_cabierto  = Math.round(interes / cuotas);
                total             = parseFloat(valor + interes) ;
                valor_cuota       = parseFloat(Math.round(total / cuotas));

                if (tipoPrestamo == 'ABIERTO') {

                    if ($.isNumeric(valor)) {
                        $('#prestamo_valor_total').val(valor);
                    }

                    if ($.isNumeric(interes_cabierto)) {
                        $('#interes_total').val(interes);
                        $('#prestamo_valor_cuota').val(interes_cabierto);
                    }

                }else  if (tipoPrestamo == 'CERRADO') {

                    if ($.isNumeric(total)) {
                        $('#prestamo_valor_total').val(total);
                    }

                    if ($.isNumeric(valor_cuota)) {
                        $('#prestamo_valor_cuota').val(valor_cuota);
                        //$('#interes_total').val(interes);
                    }
                }

            }
        });
        
    },
    
    calculoFecha: function () {
        $('#prestamo_fecha, #prestamo_fecha_inicial, #prestamo_tiempo_cobro, ' +
            '#prestamo_valor,  #prestamo_tasa, #prestamo_numero_cuotas').focusout(function (){


            var cantidad_dias                = 0;
            var tiempo_prestamo              = '';
            var fecha                        = new Fecha();
            var fecha_inicial                = new Fecha();
            var fecha_actual                 = new Fecha();
            var fecha_pago                   = new Fecha();
            var dias_diferencia_primer_pagpo = 0;
            var valor_cuota                  = 0;
            var valor_primera_cuota          = 0;
            var tipoPrestamo                 = '';

            tipoPrestamo     = $('#prestamo_tipo').val();

            fecha.setFullFecha($('#prestamo_fecha').val());
            fecha_inicial.setFullFecha($('#prestamo_fecha_inicial').val());
            fecha_actual.setFullFecha($('#prestamo_fecha_inicial').val());

            valor_cuota      = $('#prestamo_valor_cuota').val().replace(/\./g,'');
            tiempo_prestamo  = $('#prestamo_tiempo_cobro').val();

            var dias_diferencia_primer_pagpo = fecha_inicial.getDiferenciaDias(fecha.getTime());

            if(tiempo_prestamo=="MENSUAL"){
                ultimoDiaMes = fecha.ultimoDiaMes(fecha.getMonth(), fecha.getFullYear());
                //ultimoDiaMes = 30;
            }else if(tiempo_prestamo=="QUINCENAL"){
                ultimoDiaMes = 15;
            }else{
                ultimoDiaMes = 7;
            }


            valor_primera_cuota = Math.round((valor_cuota /ultimoDiaMes) * dias_diferencia_primer_pagpo);

            fecha_pago.setFullFecha(fecha_actual.getFormatoFecha());

            if($('#prestamo_fecha_inicial').val() != "" && $('#prestamo_fecha').val() != ""){
                $('#prestamo_fecha_proximo_cobro').val(fecha_pago.getFormatoFecha());

                if(tipoPrestamo =='ABIERTO') {
                     $('#prestamo_valor_proxima_cuota').val(valor_primera_cuota);
                     $('#prestamo_valor_actual').val($('#prestamo_valor_total').val());

                }else if(tipoPrestamo =='CERRADO') {
                    $('#prestamo_valor_proxima_cuota').val($('#prestamo_valor_cuota').val());
                    $('#prestamo_valor_actual').val($('#prestamo_valor_total').val());
                }
            }

            $('#prestamo_valor_abonado').val(0);

            Prestamo.validaFecha();
        });
    },
    
    validaFecha: function () {
        var fecha_inicial = new Fecha();
        var fecha = new Fecha();

        fecha_inicial.setFullFecha($('#prestamo_fecha_inicial').val());
        fecha.setFullFecha($('#prestamo_fecha').val());

        if($('#prestamo_fecha_inicial').val() != "" && $('#prestamo_fecha').val() != ""){
            if(fecha.compararFechaMayor(fecha_inicial.getFormatoFecha())){
                $('#prestamo_fecha_inicial').val("");
                $('#prestamo_fecha').val("");
                $('#prestamo_fecha_proximo_cobro').val("");
                $('#prestamo_valor_proxima_cuota').val("");
                $('#prestamo_valor_abonado').val("");
                $('#prestamo_valor_actual').val("");
            }
        }
    },

    limpiarCampoValor: function () {
        $('#cliente').focusin(function (){

           $('#prestamo_valor').val("");
        });
    }

}

$(document).ready(function () {
    Prestamo.calculoValor();
    Prestamo.calculoFecha();
    Prestamo.limpiarCampoValor();

})