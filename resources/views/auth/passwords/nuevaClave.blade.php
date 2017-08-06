<!DOCTYPE html>
<html>
<head>
    <title>Appname - @yield('title', 'ejemplo')</title>
    <meta charset="utf-8">
    <!-- iconos-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <!-- fin iconos -->



<!--<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">-->
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
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'password.nuevaClave', 'method'   =>  'POST', 'role' => 'form']) !!}

                    <div class="col-md-push-3 col-md-4">
                        <div class="form-group">
                            {!! Form::label('email', 'Correo Electrónico') !!}
                            {!! Form::email('email', null, ['class'=>'form-control', 'placeholder' =>   'example@gmail.com']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('pregunta_secreta', 'Pregunta Secreta') !!}
                            {!! Form::select('pregunta_secreta', ['' => 'SELECCIONE UNA PREGUNTA', '1' => 'NOMBRE DE LA MADRE', '2' => 'NOMBRE DEL PADRE'], null,  ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-3 col-md-5">
                        <div class="form-group">
                            {!! Form::label('respuesta_secreta', 'Respuesta Secreta') !!}
                            {!! Form::text('respuesta_secreta', null, ['class'=>'form-control', 'placeholder' =>   'Respuesta secreta']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('nueva_password', 'Nueva de la Contraseña') !!}
                        {!! Form::password('nueva_password',  ['class'=>'form-control', 'placeholder' =>   '***********']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('confirmacion_password', 'Confirmación de la Contraseña') !!}
                        {!! Form::password('confirmacion_password',  ['class'=>'form-control', 'placeholder' =>   '***********']) !!}
                    </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</body>

</html>
