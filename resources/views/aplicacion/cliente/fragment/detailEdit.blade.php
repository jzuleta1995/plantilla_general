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
                            {!! Form::label('fiador1_nombre', 'Nombre') !!}
                            {!! Form::text('fiador1_nombre', !$fiador1->isEmpty() ? $fiador1[0]->fiador_nombre : null, ['class'=>'form-control not-empty', 'placeholder' =>   'Nombre del fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador1_apellido', 'Apellido') !!}
                            {!! Form::text('fiador1_apellido', !$fiador1->isEmpty() ?  $fiador1[0]->fiador_apellido : null, ['class'=>'form-control not-empty', 'placeholder' =>   'Apellido del fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador1_documento', 'Documento') !!}
                            {!! Form::text('fiador1_documento', !$fiador1->isEmpty() ?  $fiador1[0]->fiador_documento : null, ['class'=>'form-control not-empty', 'placeholder' =>   'Documento del fiador']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador1_direccion_casa', 'Direccion Casa') !!}
                            {!! Form::text('fiador1_direccion_casa',!$fiador1->isEmpty() ? $fiador1[0]->fiador_direccion_casa : null, ['class'=>'form-control not-empty', 'placeholder' =>   'Direccion casa fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador1_direccion_trabajo', 'Direccion Trabajo') !!}
                            {!! Form::text('fiador1_direccion_trabajo', !$fiador1->isEmpty() ? $fiador1[0]->fiador_direccion_trabajo : null, ['class'=>'form-control', 'placeholder' =>   'Direccion Trabajo fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador1_telefono', 'Telefono') !!}
                            {!! Form::text('fiador1_telefono', !$fiador1->isEmpty() ?  $fiador1[0]->fiador_telefono : null, ['class'=>'form-control not-empty', 'placeholder' =>   'Telefono del fiador']) !!}
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
                            {!! Form::label('fiador2_nombre', 'Nombre') !!}
                            {!! Form::text('fiador2_nombre', !$fiador2->isEmpty() ? $fiador2[0]->fiador_nombre : null, ['class'=>'form-control not-empty', 'placeholder' =>   'Nombre del fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador2_apellido', 'Apellido') !!}
                            {!! Form::text('fiador2_apellido',!$fiador2->isEmpty() ? $fiador2[0]->fiador_apellido :  null, ['class'=>'form-control not-empty', 'placeholder' =>   'Apellido del fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador2_documento', 'Documento') !!}
                            {!! Form::text('fiador2_documento', !$fiador2->isEmpty() ? $fiador2[0]->fiador_documento : null, ['class'=>'form-control not-empty', 'placeholder' =>   'Documento del fiador']) !!}
                        </div>
                    </div>
                </div>

                <!-- TABS NUMERO 2 -->
                <div class="row">
                    <br>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador2_direccion_casa', 'Direccion Casa') !!}
                            {!! Form::text('fiador2_direccion_casa', !$fiador2->isEmpty() ? $fiador2[0]->fiador_direccion_casa : null, ['class'=>'form-control not-empty', 'placeholder' =>   'Direccion casa fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador2_direccion_trabajo', 'Direccion Trabajo') !!}
                            {!! Form::text('fiador2_direccion_trabajo', !$fiador2->isEmpty() ? $fiador2[0]->fiador_direccion_trabajo : null, ['class'=>'form-control', 'placeholder' =>   'Direccion Trabajo fiador']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('fiador2_telefono', 'Telefono') !!}
                            {!! Form::text('fiador2_telefono', !$fiador2->isEmpty() ? $fiador2[0]->fiador_telefono : null, ['class'=>'form-control not-empty', 'placeholder' =>   'Telefono fiador']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <!-- fin detalle-->
</div>