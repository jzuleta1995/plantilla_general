<!-- detalle -->
<div id="tabs">

    <ul class="nav nav-tabs nav-pills">
        <li class="active panel tabs" id="tab1">
            <a  href="#1" data-toggle="tab">Fiador 1</a>
        </li>
        <li class="panel" >
            <a id="more">
                <span class="glyphicon glyphicon-plus"></span>
            </a>
        </li>
        <li class="panel hidden tabs" id="tab2" ><a href="#2" data-toggle="tab">Fiador 2</a>
        </li>
    </ul>

    <div id="texTab2" class="panel">
        <!-- TABS NUMERO 1 -->
        <div class="tab-content ">
            <div class="tab-pane active" id="1">
                <div class="row">
                    <br>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador1_nombre', 'Nombre', ['class' => 'form-required']) !!}
                            {!! Form::text('fiador1_nombre', null, ['class'=>'form-control not-empty', 'placeholder' =>   'Nombre del fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador1_apellido', 'Apellido', ['class' => 'form-required']) !!}
                            {!! Form::text('fiador1_apellido', null, ['class'=>'form-control not-empty', 'placeholder' =>   'Apellido del fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador1_documento', 'Documento', ['class' => 'form-required']) !!}
                            {!! Form::text('fiador1_documento', null, ['class'=>'form-control not-empty', 'placeholder' =>   'Documento del fiador','onkeyup' => 'camposNumerico(this)', 'onchange' => 'camposNumerico(this)']) !!}
                        </div>
                    </div>
                </div>


                <div class="row">
                    <br>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador1_direccion_casa', 'Direccion Casa', ['class' => 'form-required']) !!}
                            {!! Form::text('fiador1_direccion_casa', null, ['class'=>'form-control not-empty', 'placeholder' =>   'Direccion casa fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador1_direccion_trabajo', 'Direccion Trabajo') !!}
                            {!! Form::text('fiador1_direccion_trabajo', null, ['class'=>'form-control', 'placeholder' =>   'Direccion Trabajo fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador1_telefono', 'Telefono', ['class' => 'form-required']) !!}
                            {!! Form::text('fiador1_telefono', null, ['class'=>'form-control not-empty', 'placeholder' =>   'Telefono del fiador','onkeyup' => 'camposNumerico(this)', 'onchange' => 'camposNumerico(this)']) !!}
                        </div>
                    </div>
                </div>
            </div>


            <div class="tab-pane" id="2">
                <div class="row">
                    <br>
                    <div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::hidden('fiador2_id', null, ['class'=>'form-control', 'id' => 'fiador_id', 'value' => 'id']) !!}
                            {!! Form::label('fiador2_nombre', 'Nombre', ['class' => 'form-required']) !!}
                            {!! Form::text('fiador2_nombre', null, ['class'=>'form-control not-empty', 'placeholder' =>   'Nombre del fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador2_apellido', 'Apellido', ['class' => 'form-required']) !!}
                            {!! Form::text('fiador2_apellido', null, ['class'=>'form-control not-empty', 'placeholder' =>   'Apellido del fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador2_documento', 'Documento', ['class' => 'form-required']) !!}
                            {!! Form::text('fiador2_documento', null, ['class'=>'form-control not-empty', 'placeholder' =>   'Documento del fiador','onkeyup' => 'camposNumerico(this)', 'onchange' => 'camposNumerico(this)']) !!}
                        </div>
                    </div>
                </div>

                <!-- TABS NUMERO 2 -->
                <div class="row">
                    <br>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador2_direccion_casa', 'Direccion Casa', ['class' => 'form-required']) !!}
                            {!! Form::text('fiador2_direccion_casa', null, ['class'=>'form-control not-empty', 'placeholder' =>   'Direccion casa fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador2_direccion_trabajo', 'Direccion Trabajo') !!}
                            {!! Form::text('fiador2_direccion_trabajo', null, ['class'=>'form-control', 'placeholder' =>   'Direccion Trabajo fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador2_telefono', 'Telefono', ['class' => 'form-required']) !!}
                            {!! Form::text('fiador2_telefono', null, ['class'=>'form-control not-empty', 'placeholder' =>   'Telefono fiador','onkeyup' => 'camposNumerico(this)', 'onchange' => 'camposNumerico(this)']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
<!-- fin detalle-->
</div>