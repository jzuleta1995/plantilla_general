@extends('template.form')

@section('action', 'Crear prestamo')

@section('content')
    <div id="btn-list" class="container">
        <a href="{{ route('prestamo.index') }}" class="btn btn-primary pull-right">Listado</a>
    </div>
    <div class="container">
        {!! Form::open(['route' => 'prestamo.store', 'method'   =>  'POST' ]) !!}
          <div class="container panel" id="design">
              @include('aplicacion.prestamo.fragment.form')
            </div>
        </br>
            <div class="container">
                <div class="col-md-6">
                    {!! Form::submit('ENVIAR',  ['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
        <br>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/aplicacion/prestamo/prestamo.js') }}"></script>
    <script src="{{ asset('js/autocomplete.js') }}"></script>
    <script>autocompleteClass.autocompleteComponent('#cliente', '#cliente_id', 'cliente');</script>

    <script type="text/javascript">
        function mostrar(){

            if(document.getElementById('prestamo_tipo').value =="ABIERTO"){
               // document.getElementById('tipo_prestamo').value = 0;
                document.getElementById('prestamo_numero_cuotas').value = 0;
                document.getElementById('prestamo_tasa').value = 0;
                document.getElementById('prestamo_valor').value = 0;

                document.getElementById('numero_cuota').style.display = 'none';

            }else if(document.getElementById('prestamo_tipo').value =="CERRADO"){

                document.getElementById('prestamo_numero_cuotas').value = 0;
                document.getElementById('prestamo_tasa').value = 0;
                document.getElementById('prestamo_valor').value = 0;

                document.getElementById('numero_cuota').style.display = 'block';
            }
        }


    </script>
@endsection
