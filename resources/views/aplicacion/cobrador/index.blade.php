@extends('template.form')

@section('action', 'Listado de Cobradores')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">

            <!-- inicio campo buscar -->
            {!! Form::open(['route' => 'cobrador.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'] ) !!}
            <div class="form-group">
                {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre Cobrador']) !!}
            </div>
                   <button type="submit" class="btn btn-default">Buscar</button>
            {!! Form::close() !!}
         <!-- fin campo buscar-->
            <p>
                <a href="{{ route('cobrador.create') }}" class="btn btn-primary">Registrar nuevo cobrador</a>
            </p>
            <p>
                <span id="cobrador-total"> {{ $cobradors->total() }} </span>registros |
                pagina {{ $cobradors->currentPage() }}
                de {{ $cobradors->lastPage() }}
            </p>

            @include('template.partials.info')

        <table class="table table-hover table-striped table-condensed">
            <thead>
                <th class="text-center">ID</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Acción</th>
            </thead>
            <tbody>
            @foreach($cobradors as $cobrador)
                <tr>
                    <td class="text-center">{{ $cobrador->id }}</td>
                    <td class="text-center">{{ $cobrador->cobrador_nombre }}</td>
                    <td class="text-center">{{ $cobrador->cobrador_apellido }}</td>
                    <td class="text-center">{{ $cobrador->cobrador_estado }}</td>
                    <td class="text-center">
                        <a href="{{ route('cobrador.edit', $cobrador->id) }}" class="btn btn-link">editar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
      {!! $cobradors->render() !!}
    </div>
    </div>
@endsection