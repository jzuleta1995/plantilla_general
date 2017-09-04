@extends('template.form')

@section('action', 'Crear cobrador')

@section('content')
    <div class="container" id="btn-list">
        <a href="{{ route('cobrador.index') }}" class="btn btn-primary pull-right">Listado</a>
    </div>
    <div class="container panel" id="design">
            <!-- se incluye mensajes de erros -->
             @include('template.partials.error')

            {!! Form::open(['route' => 'cobrador.store', 'method'   =>  'POST', 'id' => 'formulario', 'autocomplete' => 'off']) !!}
                 @include('aplicacion.cobrador.fragment.form')
            {!! Form::close() !!}
        <br>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/aplicacion/general/limpiarFormulario.js') }}"></script>
    <script src="{{ asset('js/aplicacion/general/validaCamposNumericos.js') }}"></script>
@endsection