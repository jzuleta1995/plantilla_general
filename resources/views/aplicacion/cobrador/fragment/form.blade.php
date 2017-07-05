
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre') !!}
            {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'  =>  'Nombre de cobrador']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('apellido', 'Apellido') !!}
            {!! Form::text('apellido', null, ['class'=>'form-control','placeholder'  =>  'Apellido de cobrador']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('documento', 'Documento ') !!}
            {!! Form::text('documento', null, ['class'=>'form-control','placeholder'  =>  'Documento de cobrador']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('direccion', 'Direccion') !!}
            {!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder' =>   'Direccion casa cobrador']) !!}
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('telefono', 'Telefono') !!}
            {!! Form::text('telefono', null, ['class'=>'form-control', 'placeholder' =>   'Telefono de cobrador']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('celular', 'Celular') !!}
            {!! Form::text('celular', null, ['class'=>'form-control', 'placeholder' =>   'Telefono cobrador']) !!}
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('ciudad', 'Ciudad') !!}
            {!! Form::text('ciudad', null, ['class'=>'form-control','placeholder'  =>  'Ciudad de Residencia']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('estado', 'Estado del cobrador') !!}
            {!! Form::select('estado', ['' => 'Seleccione un Estado', 'ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO'], null,  ['class'=>'form-control']) !!}
        </div>
    </div>
</div>
</br>


<br>
<div class="row">
    <div class="col-md-6">
        {!! Form::submit('ENVIAR',  ['class'=>'btn btn-primary']) !!}
    </div>
</div>
