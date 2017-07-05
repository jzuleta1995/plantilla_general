@extends('template.form')

@section('action', 'Listado usuario')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">

            <!-- inicio campo buscar -->
            {!! Form::open(['route' => 'user.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'] ) !!}
            <div class="form-group">
                {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Usuario']) !!}
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
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Estado</th>
                  <th>Accion</th>
                </tr>
                <tbody>
                   @foreach($users as $user)
                       <tr>
                           <td>{{ $user->id }}</td>
                           <td>{{ $user->nombre }}</td>
                           <td>{{ $user->apellido }}</td>
                           <td>{{ $user->estado }}</td>
                           <td>
                               <a href="{{ route('user.edit', $user->id) }}" class="btn btn-link">Editar</a>


                               <a href="{{ route('excel.index', $user->id) }}" class="btn btn-link">ver</a>


                              <!--

                               {!! Form::open(['route' =>['destroy', $user->id], 'method' => 'DELETE']) !!}
                               <a href="#" class="btn-delete">Eliminar</a>
                               {!! Form::close() !!}
                               -->
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