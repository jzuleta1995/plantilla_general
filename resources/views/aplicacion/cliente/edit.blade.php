@extends('template.form')

@section('action', 'Actualizar cliente')

@section('content')
    <a href="{{ route('cliente.index') }}" class="btn btn-primary pull-right">Listado</a><hr>

    <div class="container">
        {!! Form::model($clientes, ['route' => ['cliente.update' ,$clientes->id], 'method' => 'PUT']) !!}

        @include('aplicacion.cliente.fragment.form')

        {!! Form::close() !!}
    </div>
@endsection