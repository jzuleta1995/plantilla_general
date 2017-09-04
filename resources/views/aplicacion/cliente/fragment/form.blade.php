<div class="row">
    <div class="col-md-push-1 col-md-4">
        <div class="form-group">
            {!! Form::label('cliente_nombre', 'Nombre', ['class' => 'form-required']) !!}
            {!! Form::text('cliente_nombre', null, ['class'=>'form-control', 'id' =>'nombre', 'value' => '', 'placeholder'  =>  'Nombre del cliente']) !!}
    </div>
    </div>
    <div class="col-md-push-2 col-md-4">
        <div class="form-group">
            {!! Form::label('cliente_apellido', 'Apellido', ['class' => 'form-required']) !!}
            {!! Form::text('cliente_apellido', null, ['class'=>'form-control','placeholder'  =>  'Apellido del cliente']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-push-1 col-md-3">
        <div class="form-group">
            {!! Form::label('cliente_documento', 'Documento', ['class' => 'form-required']) !!}
            {!! Form::text('cliente_documento', null, ['class'=>'form-control','placeholder'  =>  'Documento del cliente','onkeyup' => 'camposNumerico(this)', 'onchange' => 'camposNumerico(this)']) !!}
        </div>
    </div>
    <div class="col-md-push-3 col-md-4">
        <div class="form-group">
            {!! Form::label('cliente_direccion_casa', 'Direccion Casa', ['class' => 'form-required']) !!}
            {!! Form::text('cliente_direccion_casa', null, ['class'=>'form-control', 'placeholder' =>   'Direccion casa cliente']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-push-1 col-md-4">
        <div class="form-group">
            {!! Form::label('cliente_direccion_trabajo', 'Direccion trabajo', ['class' => 'form-required']) !!}
            {!! Form::text('cliente_direccion_trabajo', null, ['class'=>'form-control','placeholder'  =>  'Direccion trabajo cliente']) !!}
        </div>
    </div>
    <div class="col-md-push-2 col-md-4">
        <div class="form-group">
            {!! Form::label('cliente_lugar_trabajo', 'Lugar trabajo') !!}
            {!! Form::text('cliente_lugar_trabajo', null, ['class'=>'form-control','placeholder'  =>  'Lugar trabajo cliente']) !!}
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-push-1 col-md-3">
        <div class="form-group">
            {!! Form::label('cliente_telefono', 'Telefono', ['class' => 'form-required']) !!}
            {!! Form::text('cliente_telefono', null, ['class'=>'form-control', 'placeholder' =>   'Telefono del cliente','onkeyup' => 'camposNumerico(this)', 'onchange' => 'camposNumerico(this)']) !!}
        </div>
    </div>
    <div class="col-md-push-3 col-md-3">
        <div class="form-group">
            {!! Form::label('cliente_celular', 'Celular', ['class' => 'form-required']) !!}
            {!! Form::text('cliente_celular', null, ['class'=>'form-control', 'placeholder' =>   'Telefono celular','onkeyup' => 'camposNumerico(this)', 'onchange' => 'camposNumerico(this)']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-push-1 col-md-4">
        <div class="form-group">
            {!! Form::label('cobrador', 'Cobrador') !!}
            {!! Form::hidden('cobrador_id', null, ['class'=>'form-control', 'id' => 'cobrador_id', 'value' => 'id', 'placeholder'  =>  'Nombre del cobrador']) !!}
            @if(is_object($cobrador))
                {!! Form::text('cobrador', $cobrador->cobrador_nombre_completo, ['class'=>'form-control', 'id' => 'cobrador', 'value' => 'id', 'placeholder'  =>  'Nombre del cobrador', 'size'    => 'S']) !!}
            @else
                {!! Form::text('cobrador', null, ['class'=>'form-control', 'id' => 'cobrador', 'value' => 'id', 'placeholder'  =>  'Nombre del cobrador']) !!}
            @endif
        </div>
    </div>
    <div class="col-md-push-2 col-md-4">
        <div class="form-group">
            {!! Form::label('cliente_ciudad', 'Ciudad') !!}
            {!! Form::text('cliente_ciudad', null, ['class'=>'form-control','placeholder'  =>  'Ciudad de Residencia']) !!}
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-push-1 col-md-3">
        <div class="form-group">
            {!! Form::label('cliente_estado', 'Estado del cliente', ['class' => 'form-required']) !!}
            {!! Form::select('cliente_estado', ['' => 'SELECCIONE UN ESTADO', 'ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO'], null,  ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-push-3 col-md-2">
        <div class="form-group">
            {!! Form::label('aplica_fiador', 'Aplica fiador') !!}
            @if($aplica_fiador)
                {!! Form::checkbox('aplica_fiador', null, $aplica_fiador, ['class'=>'form-control']) !!}
            @else
                {!! Form::checkbox('aplica_fiador', null, false, ['class'=>'form-control']) !!}
            @endif
        </div>
    </div>
</div>
<br>
