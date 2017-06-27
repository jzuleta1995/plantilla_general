@extends('template.form')

@section('action', 'Crear cliente')

@section('content')
    <a href="{{ route('cliente.index') }}" class="btn btn-primary pull-right">Listado</a><hr>

    <div class="container">
        {!! Form::open(['route' => 'cliente.store', 'method'   =>  'POST']) !!}

                @include('aplicacion.cliente.fragment.form')

        {!! Form::close() !!}
    </div>
@endsection

