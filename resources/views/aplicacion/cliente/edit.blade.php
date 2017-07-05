@extends('template.form')

@section('action', 'Actualizar cliente')

@section('content')
    <div class="container panel">
        <br>
    <a href="{{ route('cliente.index') }}" class="btn btn-primary pull-right">Listado</a>
        </br></br>

    <!-- se incluye mensajes de erros -->
    @include('template.partials.error')

        {!! Form::model($clientes, ['route' => ['cliente.update' ,$clientes->id], 'method' => 'PUT']) !!}
             @include('aplicacion.cliente.fragment.form')
        {!! Form::close() !!}
        <br>
    </div>
@endsection