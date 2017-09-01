@extends('template.form')

@section('action', 'Editar usuario')

@section('content')
    <div id="btn-list" class="container">
        <p >
            <a href="{{ route('user.index') }}" class="btn btn-primary pull-right">Listado</a>
        </p>
    </div>

    <div class="container panel" id="design">
             <!-- se incluye mensajes de erros -->
    @include('template.partials.error')

        {!! Form::model($user, ['route' => ['user.update' ,$user->id], 'method' => 'PUT']) !!}

        <div class="row">
            <div class="col-md-push-1 col-md-4">
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre', ['class' => 'form-required']) !!}
                    {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'  =>  'Nombre de usuario']) !!}
                </div>
            </div>
            <div class="col-md-push-2 col-md-4">
                <div class="form-group">
                    {!! Form::label('apellido', 'Apellido', ['class' => 'form-required']) !!}
                    {!! Form::text('apellido', null, ['class'=>'form-control','placeholder'  =>  'Apellido de usuario']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-push-1 col-md-3">
                <div class="form-group">
                    {!! Form::label('documento', 'Documento del usuario', ['class' => 'form-required']) !!}
                    {!! Form::text('documento', null, ['class'=>'form-control','placeholder'  =>  'Documento de usuario']) !!}
                </div>
            </div>
            <div class="col-md-push-3 col-md-4">
                <div class="form-group">
                    {!! Form::label('direccion', 'Direccion del usuario', ['class' => 'form-required']) !!}
                    {!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder' =>   'Direccion de usuario']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-push-1 col-md-3">
                <div class="form-group">
                    {!! Form::label('telefono', 'Telefono', ['class' => 'form-required']) !!}
                    {!! Form::text('telefono', null, ['class'=>'form-control','placeholder'  =>  'Telefono de usuario']) !!}
                </div>
            </div>
            <div class="col-md-push-3 col-md-4">
                <div class="form-group">
                    {!! Form::label('email', 'Correo del usuario', ['class' => 'form-required']) !!}
                    {!! Form::text('email', null, ['class'=>'form-control', 'placeholder' =>   'example@gmail.com']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-push-1 col-md-3">
                <div class="form-group">
                    {!! Form::label('tipo', 'Tipo de Usuario') !!}
                    {!! Form::select('tipo', ['' => 'SELECCIONE UN TIPO','ADMINISTRADOR' => 'ADMINISTRADOR', 'MIEMBRO' => 'MIEMBRO'], null,  ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="col-md-push-3 col-md-3">
                <div class="form-group">
                    {!! Form::label('estado', 'Estado del usuario') !!}
                    {!! Form::select('estado', ['' => 'SELECCIONE UN ESTADO', 'ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO'], null,  ['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <br>
            <div class="col-md-push-1 col-md-6">
                {!! Form::submit('ENVIAR',  ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
        </br>
        {!! Form::close() !!}
    </div>
@endsection
