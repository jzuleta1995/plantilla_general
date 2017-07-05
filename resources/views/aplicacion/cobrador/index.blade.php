@extends('template.form')

@section('action', 'Listado cobrador')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">

            <!-- inicio campo buscar -->
            {!! Form::open(['route' => 'cobrador.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'] ) !!}
            <div class="form-group">
                {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Usuario']) !!}
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

        <table class="table table-hover table-striped">
            <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Estado</th>
            <th>Editar</th>
            <th>Eliminar</th>

            </thead>
            <tbody>
            @foreach($cobradors as $cobrador)
                <tr>
                    <td>{{ $cobrador->id }}</td>
                    <td>{{ $cobrador->nombre }}</td>
                    <td>{{ $cobrador->apellido }}</td>
                    <td>{{ $cobrador->estado }}</td>
                    <td>
                        <a href="{{ route('cobrador.edit', $cobrador->id) }}" class="btn btn-link">editar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                    <td>
                        {!! Form::open(['route' =>['destroy', $cobrador->id], 'method' => 'DELETE']) !!}
                        <a href="#" class="btn-delete">Eliminar</a>
                        {!! Form::close() !!}
                    </td>
                </tr>



            @endforeach

            </tbody>
        </table>
      {!! $cobradors->render() !!}
    </div>
    </div>
@endsection