@extends('template.form')

@section('action', 'Crear cobrador')

@section('content')
    <div class="container panel">
        <br>
               <a href="{{ route('cobrador.index') }}" class="btn btn-primary pull-right">Listado</a>
        </br></br>
            <!-- se incluye mensajes de erros -->
             @include('template.partials.error')

            {!! Form::open(['route' => 'cobrador.store', 'method'   =>  'POST']) !!}
                 @include('aplicacion.cobrador.fragment.form')
            {!! Form::close() !!}
        <br>
    </div>
@endsection