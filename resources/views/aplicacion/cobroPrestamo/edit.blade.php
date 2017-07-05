@extends('template.form')

@section('action', 'Actualizar cobro')

@section('content')
    <div class="container panel">
        <br>
    <a href="{{ route('cobroPrestamo.index') }}" class="btn btn-primary pull-right">Listado</a>
        </br></br>

        {!! Form::model($cobros, ['route' => ['cobroPrestamo.update' ,$cobros->id], 'method' => 'PUT']) !!}
            @include('aplicacion.cobroPrestamo.fragment.form')
        {!! Form::close() !!}
        <br>
    </div>
@endsection