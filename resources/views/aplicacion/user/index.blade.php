@extends('template.form')

@section('action', 'Listado de Usuarios')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">

            <!-- inicio campo buscar -->
            {!! Form::open(['route' => 'user.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'] ) !!}
            <div class="form-group">
                {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Usuario']) !!}
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>

            {!! Form::close() !!}
            <!-- fin campo buscar-->

            <p>
                <a href="{{ route('user.create') }}" class="btn btn-primary">Registrar nuevo usuario</a>
            </p>
            <p>
                <span id="users-total"> {{ $users->total() }} </span>registros |
                pagina {{ $users->currentPage() }}
                de {{ $users->lastPage() }}
            </p>

            <div id="alert" class="alert alert-info"></div>

            @include('template.partials.info')

            <table class="table  table-striped" >
                <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Apellido</th>
                  <th class="text-center">Tipo</th>
                  <th class="text-center">Estado</th>
                  <th class="text-center">Acción</th>
                </tr>
                <tbody>
                   @foreach($users as $user)
                       <tr>
                           <td class="text-center">{{ $user->id }}</td>
                           <td class="text-center">{{ $user->nombre }}</td>
                           <td class="text-center">{{ $user->apellido }}</td>
                           <td class="text-center">
                               @if($user->tipo == 'ADMINISTRADOR')
                                   <span class="label label-danger">{{ $user->tipo }}</span>
                               @else
                                   <span class="label label-success">{{ $user->tipo }}</span>
                               @endif
                           </td>
                           <td class="text-center">{{ $user->estado }}</td>
                           <td class="text-center">
                               <a href="{{ route('user.edit', $user->id) }}" class="btn btn-link">Editar</a>
                           </td>
                       </tr>
                    @endforeach

                </tbody>
            </table>
            {!! $users->render() !!}
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection