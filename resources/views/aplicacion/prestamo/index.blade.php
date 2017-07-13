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
                <th>ID</th>
                <th>Cliente</th>
                <th>Valor Prestamo</th>
                <th>Tasa %</th>
                <th>Accion</th>
                </thead>
                <tbody>
                @foreach($prestamos as $prestamo)
                    <tr>
                        <td>{{ $prestamo->id }}</td>
                        <td>{{ $prestamo->nombre }}</td>
                        <td>{{ $prestamo->valor_prestamo }}</td>
                        <td>{{ $prestamo->tasa }} %</td>
                        <td>
                            <a href="{{ route('prestamo.edit', $prestamo->id) }}" class="btn btn-link">editar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <!--  {!! Form::open(['route' =>['destroy', $prestamo->id], 'method' => 'DELETE']) !!}
                            <a href="#" class="btn-delete">Eliminar</a>
                            {!! Form::close() !!}-->
                        </td>
                    </tr>



                @endforeach

                </tbody>
            </table>
            {!! $prestamos->render() !!}
        </div>
    </div>
@endsection