@extends('template.form')

@section('action', 'Listado cobro')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">

            <!-- inicio campo buscar -->
            {!! Form::open(['route' => 'cobrador.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'] ) !!}
            <div class="form-group">
                {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Cliente']) !!}
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
            {!! Form::close() !!}
        <!-- fin campo buscar-->
            <p>
                <a href="{{ route('cobroPrestamo.create') }}" class="btn btn-primary">Registrar nuevo cobrador</a>
            </p>
            <p>
                <span id="cobros-total"> {{ $cobros->total() }} </span>registros |
                pagina {{ $cobros->currentPage() }}
                de {{ $cobros->lastPage() }}
            </p>

            @include('template.partials.info')

            <table class="table table-hover table-striped">
                <thead>
                <th>ID</th>
                <th>cliente</th>
                <th>prestamo</th>
                <th>valor pagar</th>
                <th>Editar</th>
                <th>Eliminar</th>

                </thead>
                <tbody>
                @foreach($cobros as $cobro)
                    <tr>
                        <td>{{ $cobro->id }}</td>
                        <td>{{ $cobro->cliente }}</td>
                        <td>{{ $cobro->prestamo }}</td>
                        <td>{{ $cobro->valor_pagar }}</td>
                        <td>
                            <a href="{{ route('cobroPrestamo.edit', $cobro->id) }}" class="btn btn-link">editar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td>
                            {!! Form::open(['route' =>['destroy', $cobro->id], 'method' => 'DELETE']) !!}
                            <a href="#" class="btn-delete">Eliminar</a>
                            {!! Form::close() !!}
                        </td>
                    </tr>



                @endforeach

                </tbody>
            </table>
            {!! $cobros->render() !!}
        </div>
    </div>
@endsection