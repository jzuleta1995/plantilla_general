@extends('template.form')

@section('action', 'Actualizar cobrador')

@section('content')
    <div class="container panel">
        <br>
    <a href="{{ route('cobrador.index') }}" class="btn btn-primary pull-right">Listado</a>
        </br></br>

    <!-- se incluye mensajes de erros -->
    @include('template.partials.error')
        {!! Form::model($cobradors, ['route' => ['cobrador.update' ,$cobradors->id], 'method' => 'PUT']) !!}
            @include('aplicacion.cobrador.fragment.form')
        {!! Form::close() !!}
        <br>
    </div>
@endsection