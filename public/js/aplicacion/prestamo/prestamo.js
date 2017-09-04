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

            valor           = parseInt($('#prestamo_valor').val().replace(/\./g,''));
            tasa            = parseInt($('#prestamo_tasa').val().replace(/\./g,''));
            cuotas          = parseInt($('#prestamo_numero_cuotas').val().replace(/\./g,''));

            $('#prestamo_valor_abonado').val(0);

            if(valor >0 && tasa >0 && cuotas >0){
                interes           = Math.round(valor * tasa) / 100;
                interes_cabierto  = Math.round(interes / cuotas);
                total             = valor + interes;
                valor_cuota       = Math.round(total / cuotas);

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
                        $('#interes_total').val(interes);
                    }
                }

            }
        });
        
    },
    
    calculoFecha: function () {
        $('#prestamo_fecha, #prestamo_fecha_inicial, #prestamo_tiempo_cobro').blur(function (){


            var cantidad_dias                = 0;
            var tiempo_prestamo              = '';
            var fecha                        = new Fecha;
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

            if(tiempo_prestamo =='SEMANAL'){

                /* 1-el valor de la cuota se multiplica por 4 ya que es semanal asi se obtendra el valor delinteres mensual
                   2- ya que el prestamo es semanal se divide por 28 dias para obtener el valor del dia
                   3- despues de obtener el valor del dia, se multiplica por los dias faltantes antes del pago de
                      la primera cuota,para que se pague el valor excedente */

                valor_primera_cuota = Math.round(((valor_cuota * 4) / 28) * dias_diferencia_primer_pagpo);

            }else if(tiempo_prestamo =='QUINCENAL'){
                valor_primera_cuota  = Math.round(((valor_cuota * 2) / 30) * dias_diferencia_primer_pagpo);

            }else if(tiempo_prestamo =='MENSUAL'){
                valor_primera_cuota = Math.round((valor_cuota /30) * dias_diferencia_primer_pagpo);
            }

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
            }
        }
    }
}

$(document).ready(function () {
    Prestamo.calculoValor();
    Prestamo.calculoFecha();
})