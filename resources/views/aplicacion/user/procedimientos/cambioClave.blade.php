@extends('template.form')

@section('action', 'Cambio Clave')

@section('content')
    @include('template.partials.info')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" id="desing">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'user.cambioClave', 'method'   =>  'POST', 'role' => 'form']) !!}

                    <div class="form-group">
                        {!! Form::label('password', 'Contraseña Actual') !!}
                        {!! Form::password('password',  ['class'=>'form-control', 'placeholder' =>   '***********']) !!}
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
    </div>
@endsection
