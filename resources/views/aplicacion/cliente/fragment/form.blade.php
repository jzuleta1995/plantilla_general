
<div class="row">
    <div class="col-md-5">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre') !!}
            {!! Form::text('nombre', null, ['class'=>'form-control', 'id' =>'nombre', 'value' => '', 'placeholder'  =>  'Nombre de cliente']) !!}
    </div>
    </div>
    <div class="col-md-5  col-md-push-1">
        <div class="form-group">
            {!! Form::label('apellido', 'Apellido') !!}
            {!! Form::text('apellido', null, ['class'=>'form-control','placeholder'  =>  'Apellido de cliente']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('documento', 'Documento ') !!}
            {!! Form::text('documento', null, ['class'=>'form-control','placeholder'  =>  'Documento de cliente']) !!}
        </div>
    </div>
    <div class="col-md-5 col-md-push-3">
        <div class="form-group">
            {!! Form::label('direccion_casa', 'Direccion Casa') !!}
            {!! Form::text('direccion_casa', null, ['class'=>'form-control', 'placeholder' =>   'Direccion casa cliente']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="form-group">
            {!! Form::label('direccion_trabajo', 'Direccion trabajo') !!}
            {!! Form::text('direccion_trabajo', null, ['class'=>'form-control','placeholder'  =>  'Direccion trabajo cliente']) !!}
        </div>
    </div>
    <div class="col-md-5  col-md-push-1">
        <div class="form-group">
            {!! Form::label('lugar_trabajo', 'Lugar trabajo') !!}
            {!! Form::text('lugar_trabajo', null, ['class'=>'form-control','placeholder'  =>  'Lugar trabajo cliente']) !!}
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('telefono', 'Telefono') !!}
            {!! Form::text('telefono', null, ['class'=>'form-control', 'placeholder' =>   'Telefono de cliente']) !!}
        </div>
    </div>
    <div class="col-md-3 col-md-push-3">
        <div class="form-group">
            {!! Form::label('celular', 'Celular') !!}
            {!! Form::text('celular', null, ['class'=>'form-control', 'placeholder' =>   'Telefono celular']) !!}
        </div>
    </div>


</div>

<div class="row">
    <div class="col-md-5">
        <div class="form-group">
            {!! Form::label('cobrador', 'Cobrador') !!}
            {!! Form::hidden('cobrador_id', null, ['class'=>'form-control', 'id' => 'cobrador_id', 'value' => 'id', 'placeholder'  =>  'Nombre del cobrador']) !!}
            @if(is_object($cobrador))
                {!! Form::text('cobrador', $cobrador->nombre, ['class'=>'form-control', 'id' => 'cobrador', 'value' => 'id', 'placeholder'  =>  'Nombre del cobrador', 'size'    => 'S']) !!}
            @else
                {!! Form::text('cobrador', null, ['class'=>'form-control', 'id' => 'cobrador', 'value' => 'id', 'placeholder'  =>  'Nombre del cobrador']) !!}
            @endif
        </div>
    </div>
    <div class="col-md-5  col-md-push-1">
        <div class="form-group">
            {!! Form::label('ciudad', 'Ciudad') !!}
            {!! Form::text('ciudad', null, ['class'=>'form-control','placeholder'  =>  'Ciudad de Residencia']) !!}
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('estado', 'Estado del cliente') !!}
            {!! Form::select('estado', ['' => 'SELECCIONE UN ESTADO', 'ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO'], null,  ['class'=>'form-control']) !!}
        </div>

    </div>
</div>

</br>
    <!-- detalle -->

    <div id="texTab2" class="container">
        <ul class="nav nav-tabs nav-pills">
            <li class="active">
                <a  href="#1" data-toggle="tab">Fiador 1</a>
            </li>
            <li><a href="#2" data-toggle="tab">Fiador 2</a>
            </li>
        </ul>

        <!-- TABS NUMERO 1 -->

        <div class="tab-content ">
            <div class="tab-pane active" id="1">
                <div class="row">
                    <br>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('nombre_fiador1', 'Nombre') !!}
                            {!! Form::text('nombre_fiador1', null, ['class'=>'form-control', 'placeholder' =>   'Nombre fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('apellido_fiador1', 'Apellido') !!}
                            {!! Form::text('apellido_fiador1', null, ['class'=>'form-control', 'placeholder' =>   'Apellido fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('documento_fiador1', 'Documento') !!}
                            {!! Form::text('documento_fiador1', null, ['class'=>'form-control', 'placeholder' =>   'Documento fiador']) !!}
                        </div>
                    </div>
                </div>


                <div class="row">
                    <br>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('direccion_casa_fiador1', 'Direccion Casa') !!}
                            {!! Form::text('direccion_casa_fiador1', null, ['class'=>'form-control', 'placeholder' =>   'Direccion casa fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('direccion_trabajo_fiador1', 'Direccion Trabajo') !!}
                            {!! Form::text('direccion_trabajo_fiador1', null, ['class'=>'form-control', 'placeholder' =>   'Direccion Trabajo fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('telefono_fiador1', 'Telefono') !!}
                            {!! Form::text('telefono_fiador1', null, ['class'=>'form-control', 'placeholder' =>   'Telefono fiador']) !!}
                        </div>
                    </div>
                </div>
            </div>


            <div class="tab-pane" id="2">
                <div class="row">
                    <br>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('nombre_fiador2', 'Nombre') !!}
                            {!! Form::text('nombre_fiador2', null, ['class'=>'form-control', 'placeholder' =>   'Nombre fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('apellido_fiador2', 'Apellido') !!}
                            {!! Form::text('apellido_fiador2', null, ['class'=>'form-control', 'placeholder' =>   'Apellido fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('documento_fiador2', 'Documento') !!}
                            {!! Form::text('documento_fiador2', null, ['class'=>'form-control', 'placeholder' =>   'Documento fiador']) !!}
                        </div>
                    </div>
                </div>

                 <!-- TABS NUMERO 2 -->
                <div class="row">
                    <br>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('direccion_casa_fiador2', 'Direccion Casa') !!}
                            {!! Form::text('direccion_casa_fiador2', null, ['class'=>'form-control', 'placeholder' =>   'Direccion casa fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('direccion_trabajo_fiador2', 'Direccion Trabajo') !!}
                            {!! Form::text('direccion_trabajo_fiador2', null, ['class'=>'form-control', 'placeholder' =>   'Direccion Trabajo fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('telefono_fiador2', 'Telefono') !!}
                            {!! Form::text('telefono_fiador2', null, ['class'=>'form-control', 'placeholder' =>   'Telefono fiador']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fin detalle-->

    <br>
<div class="row">
    <div class="col-md-6">
        {!! Form::submit('ENVIAR',  ['class'=>'btn btn-primary']) !!}
    </div>
</div>
