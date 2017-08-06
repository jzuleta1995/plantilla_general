@extends('template.form')

@section('action', 'Listado de Clientes')

@section('content')
    <div class="panel panel-default">

        <div class="panel-body">
            <!-- inicio campo buscar -->
            {!! Form::open(['route' => 'cliente.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'] ) !!}
            <div class="form-group">
                {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Cliente']) !!}
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>

            {!! Form::close() !!}
        <!-- fin campo buscar-->
            <p>
                <a href="{{ route('cliente.create') }}" class="btn btn-primary ">Registrar nuevo cliente</a>
               <!-- <button class="btn btn-primary" id="modalOptions">Click me</button>
                <a href="home" class="confirm">Go to home</a>-->


            </p>
            <p>
                <span id="clientes-total"> {{ $clientes->total() }} </span>registros |
                pagina {{ $clientes->currentPage() }}
                de {{ $clientes->lastPage() }}
            </p>

            @include('template.partials.info')

            <table class="table table-hover table-striped table-condensed" >
            <thead>
                <th class="text-center">ID</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Acción</th>
            </thead>
            <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td class="text-center">{{ $cliente->id }}</td>
                    <td class="text-center">{{ $cliente->cliente_nombre }}</td>
                    <td class="text-center">{{ $cliente->cliente_apellido }}</td>
                    <td class="text-center">{{ $cliente->cliente_estado }}</td>

                    <td class="text-center">
                        <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-link">Editar</a>
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>
            {!! $clientes->render() !!}
        </div>
    </div>
@endsection
