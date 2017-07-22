@extends('template.form')

@section('action', 'Listado prestamo')

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
                <a href="{{ route('prestamo.create') }}" class="btn btn-primary">Registrar nuevo Prestamo</a>
            </p>
            <p>
                <span id="clientes-total"> {{ $prestamos->total() }} </span>registros |
                pagina {{ $prestamos->currentPage() }}
                de {{ $prestamos->lastPage() }}
            </p>
            

            @include('template.partials.info')

            <table class="table table-hover table-striped table-condensed">
                <thead>
                <th class="text-center">ID</th>
                <th class="text-center">Cliente</th>
                <th class="text-center">Valor Prestamo</th>
                <th class="text-center">Tasa %</th>
                <th class="text-center">Accion</th>
                </thead>
                <tbody>
                @foreach($prestamos as $prestamo)
                    <tr>
                        <td class="text-center">{{ $prestamo->id }}</td>
                        <td class="text-center">{{ $prestamo->cliente_nombre_completo }}</td>
                        <td class="text-center"> {{ $prestamo->prestamo_valor}}</td>
                        <td class="text-center">{{ $prestamo->prestamo_tasa }} %</td>
                        <td class="text-center">
                            <a href="{{ route('prestamo.show', $prestamo->id) }}" class="btn btn-link">Ver</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{ route('abono.create', $prestamo->id) }}" class="btn btn-link">Realizar Pago</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $prestamos->render() !!}
        </div>
    </div>
@endsection