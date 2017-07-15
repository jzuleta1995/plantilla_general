
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('cliente', 'Cliente') !!}
            {!! Form::hidden('cliente_id', null, ['class'=>'form-control', 'id' => 'cliente_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente']) !!}
            @if(is_object($cliente))
                {!! Form::text('cliente', $cliente->nombre, ['class'=>'form-control', 'id' => 'cliente', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente', 'size'    => 'S']) !!}
            @else
                {!! Form::text('cliente', null, ['class'=>'form-control', 'id' => 'cliente', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente', 'size'    => 'S']) !!}
            @endif
        </div>
    </div>
    <div class="col-md-push-2 col-md-4">
        <div class="form-group">
            {!! Form::label('valor_prestamo', 'Valor ') !!}
            {!! Form::Number('valor_prestamo', null, ['class'=>'form-control','placeholder'  =>  'valor prestamo']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('tasa', 'Tasa % ') !!}
            {!! Form::Number('tasa', null, ['class'=>'form-control','placeholder'  =>  'Tasa interes']) !!}
        </div>
    </div>
    <div class="col-md-push-4 col-md-3">
        <div class="form-group">
            {!! Form::label('tipo_prestamo', 'Tipo Prestamo') !!}
            {!! Form::select('tipo_prestamo', ['' => 'Seleccione un Tipo', 'ABIERTO' => 'ABIERTO', 'CERRADO' => 'CERRADO'], null,  ['class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('tiempo_cobro', 'Tiempo Prestamo') !!}
            {!! Form::select('tiempo_cobro', ['' => 'Seleccione un Estado', 'DIARIO' => 'DIARIO', 'SEMANAL' => 'SEMANAL', 'QUINCENAL' => 'QUINCENAL', 'MENSUAL' => 'MENSUAL'], null,  ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-push-3 col-md-2  ">
        <div class="form-group">
            {!! Form::label('cantidad_cuotas_pagar', 'Numero de Cuotas') !!}
            {!! Form::Number('cantidad_cuotas_pagar', null, ['class'=>'form-control', 'placeholder' =>   'Numero de Cuotas']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('valor_cuota_pagar', 'Valor Cuota') !!}
            {!! Form::Number('valor_cuota_pagar', null, ['class'=>'form-control', 'placeholder' =>   'Valor Cuota a Pagar']) !!}
        </div>
    </div>
    <div class="col-md-push-2 col-md-4">
        <div class="form-group">
            {!! Form::label('valor_total_prestamo', 'Valor Total') !!}
            {!! Form::Number('valor_total_prestamo', null, ['class'=>'form-control', 'placeholder' =>   'Valor Total']) !!}
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('estado', 'Estado') !!}
            {!! Form::select('estado', ['' => 'SELECCIONE UN ESTADO', 'ACTIVO' => 'ACTIVO', 'ANULADO' => 'ANULADO'], null,  ['class'=>'form-control']) !!}
        </div>
    </div>
</div>
</br>
</div>

    <div class="container panel">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('fecha_prestamo', 'Fecha Prestamo') !!}
                    {!! Form::date('fecha_prestamo', null, ['class'=>'form-control', 'placeholder' =>   'Nombre fiador']) !!}
                </div>
            </div>
            <div class="col-md-push-1 col-md-3">
                <div class="form-group">
                    {!! Form::label('fecha_inicio_prestamo', 'Fecha inicio prestamo') !!}
                    {!! Form::date('fecha_inicio_prestamo', null, ['class'=>'form-control', 'placeholder' =>   'Fecha Inicio prestamo']) !!}
                </div>
            </div>
            <div class="col-md-push-2 col-md-3">
                <div class="form-group">
                    {!! Form::label('fecha_proximo_cobro', 'Fecha proximo cobro') !!}
                    {!! Form::date('fecha_proximo_cobro', null, ['class'=>'form-control', 'placeholder' =>   'Documento fiador']) !!}
                </div>
            </div>
        </div>

            <div class="content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('valor_total_deuda', 'Valor total deuda') !!}
                            {!! Form::Number('valor_total_deuda', 0, ['class'=>'form-control', 'placeholder' =>   'valor total deuda', 'disabled']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-1 col-md-3">
                        <div class="form-group">
                            {!! Form::label('valor_abono_deuda', 'Valor abono deuda') !!}
                            {!! Form::Number('valor_abono_deuda', 0, ['class'=>'form-control', 'placeholder' =>   'Valor abono deuda', 'disabled']) !!}
                        </div>
                    </div>
                    <div class="col-md-push-2 col-md-3">
                        <div class="form-group">
                            {!! Form::label('valor_proximo_pago_deuda', 'Valor cancelar') !!}
                            {!! Form::Number('valor_proximo_pago_deuda', 0, ['class'=>'form-control', 'placeholder' =>   'Valor proximo pago deuda', 'disabled']) !!}
                        </div>
                    </div>
                </div>

            </div>
     </div>

    <br>
    <div class="row">
        <div class="col-md-6">
            {!! Form::submit('ENVIAR',  ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
</div>