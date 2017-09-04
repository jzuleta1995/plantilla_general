
<div class="row">
    <div class="col-md-push-1 col-md-4">

        <div class="form-group">
            {!! Form::label('cobrador_nombre', 'Nombre', ['class' => 'form-required']) !!}
            {!! Form::text('cobrador_nombre', null, ['class'=>'form-control', 'placeholder'  =>  'Nombre del cobrador']) !!}
        </div>
    </div>
    <div class="col-md-push-2 col-md-4">
        <div class="form-group">
            {!! Form::label('cobrador_apellido', 'Apellido', ['class' => 'form-required']) !!}
            {!! Form::text('cobrador_apellido', null, ['class'=>'form-control','placeholder'  =>  'Apellido del cobrador']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-push-1 col-md-3">
        <div class="form-group">
            {!! Form::label('cobrador_documento', 'Documento', ['class' => 'form-required']) !!}
            {!! Form::text('cobrador_documento', null, ['class'=>'form-control','placeholder'  =>  'Documento del cobrador','onkeyup' => 'camposNumerico(this)', 'onchange' => 'camposNumerico(this)']) !!}
        </div>
    </div>
    <div class="col-md-push-3 col-md-4">
        <div class="form-group">
            {!! Form::label('cobrador_direccion', 'Direccion', ['class' => 'form-required']) !!}
            {!! Form::text('cobrador_direccion', null, ['class'=>'form-control', 'placeholder' =>   'Direccion del cobrador']) !!}
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-push-1 col-md-3">
        <div class="form-group">
            {!! Form::label('cobrador_telefono', 'Telefono', ['class' => 'form-required']) !!}
            {!! Form::text('cobrador_telefono', null, ['class'=>'form-control', 'placeholder' =>   'Telefono del cobrador','onkeyup' => 'camposNumerico(this)', 'onchange' => 'camposNumerico(this)']) !!}
        </div>
    </div>

    <div class="col-md-push-3 col-md-3">
        <div class="form-group">
            {!! Form::label('cobrador_celular', 'Celular', ['class' => 'form-required']) !!}
            {!! Form::text('cobrador_celular', null, ['class'=>'form-control', 'placeholder' =>   'Celular del cobrador','onkeyup' => 'camposNumerico(this)', 'onchange' => 'camposNumerico(this)']) !!}
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-push-1 col-md-4">
        <div class="form-group">
            {!! Form::label('cobrador_ciudad', 'Ciudad', ['class' => 'form-required']) !!}
            {!! Form::text('cobrador_ciudad', null, ['class'=>'form-control','placeholder'  =>  'Ciudad del Residencia']) !!}
        </div>
    </div>
    <div class="col-md-push-2 col-md-3">
        <div class="form-group">
            {!! Form::label('cobrador_estado', 'Estado del cobrador', ['class' => 'form-required']) !!}
            {!! Form::select('cobrador_estado', ['' => 'SELECCIONE UN ESTADO', 'ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO'], null,  ['class'=>'form-control']) !!}
        </div>
    </div>
</div>
</br>
</br>
<div class="row">
    <div class="col-md-push-1 col-md-6">
        {!! Form::submit('ENVIAR',  ['class'=>'btn btn-primary']) !!}
    </div>
</div>
