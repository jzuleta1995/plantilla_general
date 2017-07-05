@extends('template.form')

@section('action', 'Actualizar prestamo')

@section('content')
    <div class="container panel">
    <br>
    <a href="{{ route('prestamo.index') }}" class="btn btn-primary pull-right">Listado</a>
        </br></br>

        {!! Form::model($prestamos, ['route' => ['prestamo.update' ,$prestamos->id], 'method' => 'PUT']) !!}
            @include('aplicacion.prestamo.fragment.form')
        {!! Form::close() !!}
        <br>
    </div>
@endsection