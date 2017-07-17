@extends('template.form')

@section('action', 'Crear prestamo')

@section('content')
    <div class="container panel">
        <br>
    <a href="{{ route('prestamo.index') }}" class="btn btn-primary pull-right">Listado</a>
        </br></br>

        {!! Form::open(['route' => 'prestamo.store', 'method'   =>  'POST']) !!}
            @include('aplicacion.prestamo.fragment.form')
        {!! Form::close() !!}
        <br>
    </div>
@endsection
@section('script')

    <script type="text/javascript">
        $( "#cliente" ).autocomplete({
            source:'{!! route('autocomplete', ['ruta'   =>  'cliente'])!!}',
            minlength:1,
            autoFocus:true,
            select:function(e,ui)
            {
                $('#cliente').val(ui.item.id);
                $('#cliente_id').val(ui.item.id);

            }
        });


        $('#valor_prestamo,  #tasa, #cantidad_cuotas_pagar').focusout(function () {

            var valor = 0
            var tasa = 0;
            var cuotas = 0;
            var total = 0;
            var valor_cuota = 0;
            var interes = 0;
            var tipoPrestamo = "";

            valor = parseInt($('#valor_prestamo').val());
            tasa = parseInt($('#tasa').val());
            cuotas = parseInt($('#cantidad_cuotas_pagar').val());
            tipoPrestamo = $('#tipo_prestamo').val();

            //alert(tasa);
            //alert(cuotas);
         if(valor >0 && tasa >0 && cuotas >0 && tipoPrestamo=='CERRADO' ){
             interes = (valor * tasa) / 100;
            total = (valor + interes);
            valor_cuota = total / cuotas;

            if ($.isNumeric(total)) {
                $('#valor_total_deuda').val(total);
                $('#valor_cuota_pagar').val(total);

            } else {
                $('#valor_total_deuda').val(0);
                $('#valor_cuota_pagar').val(0);

            }

            if ($.isNumeric(valor_cuota)) {
                $('#valor_proximo_pago_deuda').val(valor_cuota);
                $('#valor_total_prestamo').val(valor_cuota);

            } else {
                $('#valor_proximo_pago_deuda').val(0);
                $('#valor_total_prestamo').val(0);

            }
        }else if(valor >0 && tasa >0 && cuotas >0 && tipoPrestamo=='ABIERTO' ){
             interes = (valor * tasa) / 100;
             valor_cuota = interes / cuotas;

             if ($.isNumeric(total)) {
                 $('#valor_total_deuda').val(valor);
                 $('#valor_cuota_pagar').val(valor_cuota);

             } else {
                 $('#valor_total_deuda').val(0);
                 $('#valor_cuota_pagar').val(0);

             }

             if ($.isNumeric(valor_cuota)) {
                 $('#valor_proximo_pago_deuda').val(valor_cuota);
                 $('#valor_total_prestamo').val(valor);

             } else {
                 $('#valor_proximo_pago_deuda').val(0);
                 $('#valor_total_prestamo').val(0);

             }
         }


         });



        $('#fecha_prestamo, #tiempo_cobro').focusout(function (){


            var diario    = 1;
            var semanal   = 7;
            var quincenal = 15;
            var mensual   = 30;
            var cantidad_dias= 0;
            var tiempo_prestamos = '';


           var fecha = $('#fecha_prestamo').val();

            tiempo_prestamos = $('#tiempo_cobro').val();

            if (tiempo_prestamos =='DIARIO'){
                cantidad_dias = diario;
             }else if(tiempo_prestamos =='SEMANAL'){
                cantidad_dias = semanal;

            }else if(tiempo_prestamos =='QUINCENAL'){
                cantidad_dias = quincenal;

            }else if(tiempo_prestamos =='MENSUAL'){
                cantidad_dias = mensual;

            }

            fechaProximo = (fecha + cantidad_dias);

            if(cantidad_dias > 0){
                $('#fecha_inicio_prestamo').val(fecha);
                $('#fecha_proximo_cobro').val(fecha);
            }

            return fecha;
        });

    </script>
@endsection
