@extends('template.form')

@section('action', 'Listado cliente')

@section('content')
    <div class="panel panel-default">

        <div class="panel-body">
            <!-- inicio campo buscar -->
            {!! Form::open(['route' => 'cliente.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'] ) !!}
            <div class="form-group">
                {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Cliente']) !!}
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>

            {!! Form::close() !!}
        <!-- fin campo buscar-->
            <p>
                <a href="{{ route('cliente.create') }}" class="btn btn-primary">Registrar nuevo cliente</a>
            </p>
            <p>
                <span id="clientes-total"> {{ $clientes->total() }} </span>registros |
                pagina {{ $clientes->currentPage() }}
                de {{ $clientes->lastPage() }}
            </p>

            @include('template.partials.info')

            <table class="table table-hover table-striped table-condensed" >
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
                        <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-info">Editar</a>
                    </td>

                </tr>



            @endforeach

            </tbody>
        </table>
            {!! $clientes->render() !!}
        </div>
    </div>
@endsection