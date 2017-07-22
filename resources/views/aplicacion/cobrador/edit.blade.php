@extends('template.form')

@section('action', 'Actualizar cobrador')

@section('content')
    <div class="container" id="btn-list">
        <a href="{{ route('cobrador.index') }}" class="btn btn-primary pull-right">Listado</a>
    </div>
    <div class="container panel" id="design">
    <!-- se incluye mensajes de erros -->
        @include('template.partials.error')
        {!! Form::model($cobrador, ['route' => ['cobrador.update' ,$cobrador->id], 'method' => 'PUT']) !!}
            @include('aplicacion.cobrador.fragment.form')
        {!! Form::close() !!}
    </div>
@endsection