<!DOCTYPE html>
<html>
<head>
    <title>Appname - @yield('title', 'ejemplo')</title>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <!--libreria confirm -->
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.confirm.js') }}"></script>

    <!-- fin libreria confirm-->


</head>
<body>

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" id="desing">
                @include('template.partials.info')

                <div class="panel-heading">Login</div>
                <div class="panel-body">


                    {!! Form::open(['route' => 'password.nuevaClave', 'method'   =>  'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                        <div class="form-group">
                            <div class="col-md-6">

                            {!! Form::label('email', 'Correo Electrónico') !!}
                            {!! Form::email('email', null, ['class'=>'form-control', 'placeholder' =>   'example@gmail.com', 'onblur' => '']) !!}
                             </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">

                                {!! Form::label('pregunta_secreta', 'Pregunta Secreta') !!}
                                {!! Form::text('pregunta_secreta', null, ['class'=>'form-control', 'placeholder' =>   'Pregunta secreta', 'readonly' => 'true']) !!}

                            </div>
                        </div>
                    <div class="form-group" style="display: none">
                        <div class="col-md-6">
                            {!! Form::label('id', 'id') !!}
                            {!! Form::text('id', null, ['class'=>'form-control', 'placeholder' =>   'id']) !!}
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="col-md-6">

                            {!! Form::label('respuesta_secreta', 'Respuesta Secreta') !!}
                            {!! Form::text('respuesta_secreta', null, ['class'=>'form-control', 'placeholder' =>   'Respuesta secreta']) !!}

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">

                            {!! Form::label('nueva_password', 'Nueva de la Contraseña') !!}
                            {!! Form::password('nueva_password',  ['class'=>'form-control', 'placeholder' =>   '**********************']) !!}
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">

                            {!! Form::label('confirmacion_password', 'Confirmación de la Contraseña') !!}
                            {!! Form::password('confirmacion_password',  ['class'=>'form-control', 'placeholder' =>   '**********************']) !!}
                        </div>
                        </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/aplicacion/olvidecontrasena/olvidecontrasena.js') }}"></script>


</body>

</html>
