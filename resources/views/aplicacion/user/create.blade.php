@extends('template.form')

@section('action', 'Crear usuario')

@section('content')
    <div id="btn-list" class="container">
        <p >
            <a href="{{ route('user.index') }}" class="btn btn-primary pull-right">Listado</a>
        </p>
    </div>
    <div class="container panel" id="design">
        <br>
        <!-- se incluye mensajes de erros -->
    @include('template.partials.error')
        {!! Form::open(['route' => 'user.store', 'method'   =>  'POST', 'id' => 'formulario', 'autocomplete' => 'off']) !!}
            <div class="row">
                <div class="col-md-push-1 col-md-4">
                    <div class="form-group">
                        {!! Form::label('nombre', 'Nombre', ['class' => 'form-required']) !!}
                        {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'  =>  'Nombre del usuario']) !!}
                    </div>
                </div>
                <div class="col-md-push-2 col-md-4">
                    <div class="form-group">
                        {!! Form::label('apellido', 'Apellido', ['class' => 'form-required']) !!}
                        {!! Form::text('apellido', null, ['class'=>'form-control','placeholder'  =>  'Apellido del usuario']) !!}
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-push-1 col-md-3">
                <div class="form-group">
                    {!! Form::label('documento', 'Número de Documento', ['class' => 'form-required']) !!}
                    {!! Form::text('documento', null, ['class'=>'form-control','placeholder'  =>  'Documento del usuario','onkeyup' => 'camposNumerico(this)', 'onchange' => 'camposNumerico(this)']) !!}
                </div>
            </div>
            <div class="col-md-push-3 col-md-4">
                <div class="form-group">
                    {!! Form::label('direccion', 'Dirección', ['class' => 'form-required']) !!}
                    {!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder' =>   'Dirección de usuario']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-push-1 col-md-3">
                <div class="form-group">
                    {!! Form::label('telefono', 'Teléfono', ['class' => 'form-required']) !!}
                    {!! Form::text('telefono', null, ['class'=>'form-control','placeholder'  =>  'Teléfono del usuario','onkeyup' => 'camposNumerico(this)', 'onchange' => 'camposNumerico(this)']) !!}
                </div>
            </div>
            <div class="col-md-push-3 col-md-4">
                <div class="form-group">
                    {!! Form::label('email', 'Correo Electrónico', ['class' => 'form-required']) !!}
                    {!! Form::email('email', null, ['class'=>'form-control', 'placeholder' =>   'example@gmail.com']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-push-1 col-md-4">
                <div class="form-group">
                    {!! Form::label('password', 'Contraseña', ['class' => 'form-required']) !!}
                    {!! Form::password('password',  ['class'=>'form-control', 'placeholder' =>   '***********']) !!}
                </div>
            </div>
            <div class="col-md-push-2 col-md-4">
                <div class="form-group">
                    {!! Form::label('confirmacion_password', 'Confirmación de la Contraseña', ['class' => 'form-required']) !!}
                    {!! Form::password('confirmacion_password',  ['class'=>'form-control', 'placeholder' =>   '***********']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-push-1 col-md-3">
                <div class="form-group">
                    {!! Form::label('pregunta_secreta', 'Pregunta Secreta', ['class' => 'form-required']) !!}
                    {!! Form::select('pregunta_secreta', ['' => 'SELECCIONE UNA PREGUNTA', 'NOMBRE DE LA MADRE' => 'NOMBRE DE LA MADRE', 'NOMBRE DEL PADRE' => 'NOMBRE DEL PADRE', 'NOMBRE DE LA MASCOTA' => 'NOMBRE DE LA MASCOTA', 'NOMBRE DEL COLEGIO' => 'NOMBRE DEL COLEGIO'], null,  ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="col-md-push-3 col-md-5">
                <div class="form-group">
                    {!! Form::label('respuesta_secreta', 'Respuesta Secreta', ['class' => 'form-required']) !!}
                    {!! Form::text('respuesta_secreta', null, ['class'=>'form-control', 'placeholder' =>   'Respuesta secreta']) !!}
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
                    {!! Form::label('estado', 'Estado del usuario', ['class' => 'form-required']) !!}
                    {!! Form::select('estado', ['' => 'SELECCIONE UN ESTADO', 'ACTIVO' => 'ACTIVO','INACTIVO' => 'INACTIVO'], null,  ['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class=" col-md-push-1 col-md-6">
                {!! Form::submit('ENVIAR',  ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
        <br>
        {!! Form::close() !!}
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/aplicacion/general/limpiarFormulario.js') }}"></script>
    <script src="{{ asset('js/aplicacion/general/validaCamposNumericos.js') }}"></script>
@endsection