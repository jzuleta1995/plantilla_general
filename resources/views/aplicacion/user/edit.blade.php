@extends('template.form')

@section('action', 'Editar usuario')

@section('content')
    <div class="container panel">
        <br>
    <a href="{{ route('user.index') }}" class="btn btn-primary pull-right">Listado</a>
        </br></br>


        <!-- se incluye mensajes de erros -->
    @include('template.partials.error')

        {!! Form::model($users, ['route' => ['user.update' ,$users->id], 'method' => 'PUT']) !!}

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'  =>  'Nombre de usuario']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('apellido', 'Apellido') !!}
                    {!! Form::text('apellido', null, ['class'=>'form-control','placeholder'  =>  'Apellido de usuario']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('documento', 'Documento del usuario') !!}
                    {!! Form::text('documento', null, ['class'=>'form-control','placeholder'  =>  'Documento de usuario']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('direccion', 'Direccion del usuario') !!}
                    {!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder' =>   'Direccion de usuario']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('telefono', 'Telefono') !!}
                    {!! Form::text('telefono', null, ['class'=>'form-control','placeholder'  =>  'Telefono de usuario']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('email', 'Correo del usuario') !!}
                    {!! Form::text('email', null, ['class'=>'form-control', 'placeholder' =>   'example@gmail.com']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('pregunta_id', 'Pregunta secreta') !!}
                    {!! Form::select('pregunta_id', ['' => 'Seleccione un Pregunta', '1' => 'Nombre de la madre', '2' => 'Nombre del padre'], null,  ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('respuesta_secreta', 'Respuesta secreta') !!}
                    {!! Form::text('respuesta_secreta', null, ['class'=>'form-control', 'placeholder' =>   'Respuesta secreta']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('estado', 'Estado del usuario') !!}
                    {!! Form::select('estado', ['' => 'Seleccione un Estado', 'ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO'], null,  ['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                {!! Form::submit('ENVIAR',  ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
