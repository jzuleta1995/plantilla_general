@extends('template.form')

@section('action', 'Crear usuario')

@section('content')
    <a href="{{ route('user.index') }}" class="btn btn-primary pull-right">Listado</a><hr>

    <div class="container">
        {!! Form::open(['route' => 'user.store', 'method'   =>  'POST']) !!}
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
                    {!! Form::label('documento', 'Documento') !!}
                    {!! Form::text('documento', null, ['class'=>'form-control','placeholder'  =>  'Documento de usuario']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('direccion', 'Direccion') !!}
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
                    {!! Form::label('email', 'Correo') !!}
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
                    {!! Form::label('password', 'Contraseña') !!}
                    {!! Form::password('password',  ['class'=>'form-control', 'placeholder' =>   '***********']) !!}
                </div>
            </div>
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
