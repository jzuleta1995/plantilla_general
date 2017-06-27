@extends('template.form')

@section('action', 'Listado cliente')

@section('content')
    <a href="{{ route('user.create') }}" class="btn btn-primary pull-right">Registrar nuevo cliente</a><hr>

    <table class="table table-hover table-striped">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Estado</th>
            <th>Accion</th>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->apellido }}</td>
                <td>{{ $cliente->estado }}</td>
                <td>
                    <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-link">editar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {!! Form::open(['route' =>['destroy', $cliente->id], 'method' => 'DELETE']) !!}
                    <a href="#" class="btn-delete">Eliminar</a>
                    {!! Form::close() !!}
                </td>
            </tr>



        @endforeach

        </tbody>
    </table>

@endsection