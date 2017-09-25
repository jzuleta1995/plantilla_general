@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('template.partials.info')
                <div class="panel panel-default" id="design">
                    <div class="panel-heading">Cambio Contraseña</div>
                    <div class="panel-body">


                        {!! Form::open(['route' => 'password.nuevaClave', 'method'   =>  'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                            <div class="form-group">
                                {!! Form::label('email', 'Correo Electrónico', ['class' => 'col-md-4 col-md-offset-1']) !!}
                                <div class="col-md-6">
                                    {!! Form::email('email', null, ['class'=>'form-control ', 'placeholder' =>   'example@gmail.com', 'onblur' => '', 'autocomplete' => 'off']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                    {!! Form::label('pregunta_secreta', 'Pregunta Secreta', ['class' => 'col-md-4 col-md-offset-1']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('pregunta_secreta', null, ['class'=>'form-control', 'placeholder' =>   'Pregunta secreta', 'readonly' => 'true']) !!}
                                </div>
                            </div>
                        <div class="form-group" style="display: none">
                                {!! Form::label('id', 'id', ['class' => 'col-md-4']) !!}
                            <div class="col-md-6">
                                {!! Form::text('id', null, ['class'=>'form-control', 'placeholder' =>   'id']) !!}
                            </div>
                        </div>
                            <div class="form-group">
                                {!! Form::label('respuesta_secreta', 'Respuesta Secreta', ['class' => 'col-md-4 col-md-offset-1']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('respuesta_secreta', null, ['class'=>'form-control', 'placeholder' =>   'Respuesta secreta', 'autocomplete' => 'off']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('nueva_password', 'Nueva de la Contraseña', ['class' => 'col-md-4 col-md-offset-1']) !!}
                                <div class="col-md-6">
                                    {!! Form::password('nueva_password',  ['class'=>'form-control', 'placeholder' =>   '**********************']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('confirmacion_password', 'Confirmación de la Contraseña', ['class' => 'col-md-4 col-md-offset-1']) !!}
                                <div class="col-md-6">
                                    {!! Form::password('confirmacion_password',  ['class'=>'form-control', 'placeholder' =>   '**********************']) !!}
                                </div>
                            </div>
                            <div class="col-md-8 col-md-offset-5">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                                <a class="btn btn-primary" href="{{ route('login') }}">
                                    regresar
                                </a>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/aplicacion/olvidecontrasena/olvidecontrasena.js') }}"></script>

@endsection
