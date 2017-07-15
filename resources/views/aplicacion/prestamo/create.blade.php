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

            valor   = parseInt($('#valor_prestamo').val());
            tasa    = parseInt($('#tasa').val());
            cuotas  = parseInt($('#cantidad_cuotas_pagar').val());

            interes = (valor * tasa) / 100;
            total = (valor + interes);
            valor_cuota = total / cuotas;

            if($.isNumeric(total)){
                $('#valor_total_deuda').val(total);
            }else{
                $('#valor_total_deuda').val(0);
            }

            if($.isNumeric(valor_cuota)){
                $('#valor_proximo_pago_deuda').val(valor_cuota);
            }else{
                $('#valor_proximo_pago_deuda').val(0);
            }

        });



    </script>
@endsection
