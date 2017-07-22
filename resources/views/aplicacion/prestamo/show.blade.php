@extends('template.form')

@section('action', 'Prestamo Actual de ' . $cliente->cliente_nombre_completo)

@section('content')
    <div id="btn-list" class="container">
        <a href="{{ route('prestamo.index') }}" class="btn btn-primary pull-right">Listado</a>
    </div>
    <div class="container panel" id="design">
        {!! Form::model($prestamo, ['route' => ['prestamo.show' ,$prestamo->id], 'method' => 'GET']) !!}
            @include('aplicacion.prestamo.fragment.form')
        {!! Form::close() !!}
        <br>
    </div>
    <h3 class="text-center">Visor Abonos</h3>
    <br>
    @include('aplicacion.prestamo.fragment.visorabono')
    <br>
@endsection