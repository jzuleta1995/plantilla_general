@extends('template.form')

@section('action', 'Crear prestamo')

@section('content')
    <div id="btn-list" class="container">
        <a href="{{ route('prestamo.index') }}" class="btn btn-primary pull-right">Listado</a>
    </div>
    <div class="container">
        <!-- se incluye mensajes de erros -->
        @include('template.partials.error')
        @include('template.partials.info')


        {!! Form::open(['route' => 'prestamo.store', 'method'   =>  'POST', 'id' => 'formulario', 'autocomplete' => 'off']) !!}
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
    <script src="{{ asset('js/Fecha.js') }}"></script>
    <script src="{{ asset('js/aplicacion/prestamo/prestamo.js') }}"></script>
    <script src="{{ asset('js/aplicacion/general/separadormiles.js') }}"></script>
    <script src="{{ asset('js/aplicacion/prestamo/validaUnicoPrestamoCliente.js') }}"></script>
    <script src="{{ asset('js/aplicacion/prestamo/mostrarNumeroCuotas.js') }}"></script>
    <script src="{{ asset('js/autocomplete.js') }}"></script>
    <script>autocompleteClass.autocompleteComponent('#cliente', '#cliente_id', 'cliente');</script>

@endsection
