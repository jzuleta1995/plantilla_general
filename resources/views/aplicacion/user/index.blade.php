@extends('template.form')

@section('action', 'Listado usuario')

@section('content')
    <div>
        <a href="{{ route('user.create') }}" class="btn btn-primary pull-right">Registrar nuevo usuario</a><hr>
        <div id="alert" class="alert alert-info"></div>

        <table class="table table-striped">
            <thead>
              <th>ID</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Estado</th>
              <th>Accion</th>
            </thead>
            <tbody>
               @foreach($users as $user)
                   <tr>
                       <td>{{ $user->id }}</td>
                       <td>{{ $user->nombre }}</td>
                       <td>{{ $user->apellido }}</td>
                       <td>{{ $user->estado }}</td>
                       <td>
                           <a href="{{ route('user.edit', $user->id) }}" class="btn btn-link">Editar</a>
                           {!! Form::open(['route' =>['destroy', $user->id], 'method' => 'DELETE']) !!}
                           <a href="#" class="btn-delete">Eliminar</a>
                           {!! Form::close() !!}
                       </td>
                   </tr>
                @endforeach

            </tbody>
        </table>
        {!! $users->render() !!}
    </div>

@endsection

@section('script')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection