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
    </div>
    @include('aplicacion.prestamo.fragment.visorabono')
    <br>
@endsection
@section('script')
    <script src="{{asset('js/aplicacion/abono/anula_abono.js')}}"></script>
    <script src="{{asset('js/aplicacion/general/validarPasswordAdmin.js')}}"></script>
@endsection