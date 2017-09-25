@extends('template.form')

@section('action', 'Actualizar cliente')

@section('content')
    <div id="btn-list" class="container">
        <a href="{{ route('cliente.index') }}" class="btn btn-primary pull-right">Listado</a>
    </div>
    <div class="container">
        <!-- se incluye mensajes de erros -->
        @include('template.partials.error')

        {!! Form::model($cliente, ['route' => ['cliente.update' ,$cliente->id], 'method' => 'PUT', 'id' => 'formulario']) !!}
        <div class="container panel" id="design">
            @include('aplicacion.cliente.fragment.form')
        </div>
        <br>
        <div id="detail_fiador" class="hidden">
            @if(!$fiadors->isEmpty())
                @include('aplicacion.cliente.fragment.detailEdit')
            @else
                @include('aplicacion.cliente.fragment.detail')
            @endif
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

    <script src="{{ asset('js/aplicacion/general/limpiarFormulario.js') }}"></script>
    <script src="{{ asset('js/aplicacion/general/validaCamposNumericos.js') }}"></script>
    <script src="{{ asset('js/aplicacion/cliente/cliente.js') }}"></script>
    <script src="{{ asset('js/autocomplete.js') }}"></script>
    <script>autocompleteClass.autocompleteComponent('#cobrador', '#cobrador_id', 'cobrador');</script>
@endsection
