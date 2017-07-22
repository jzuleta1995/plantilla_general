    <div class="row">
        <div class="col-md-push-1 col-md-4">
            <div class="form-group">
                {!! Form::label('cliente', 'Cliente') !!}
                {!! Form::hidden('cliente_id', null, ['class'=>'form-control', 'id' => 'cliente_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente']) !!}
                @if(is_object($cliente))
                    {!! Form::text('cliente', $cliente->cliente_nombre_completo, ['class'=>'form-control', 'id' => 'cliente', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente', 'size'    => 'S']) !!}
                @else
                    {!! Form::text('cliente', null, ['class'=>'form-control', 'id' => 'cliente', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente', 'size'    => 'S']) !!}
                @endif
            </div>
        </div>
        <div class="col-md-push-3 col-md-3">
            <div class="form-group">
                {!! Form::label('prestamo_valor', 'Valor ') !!}
                {!! Form::Number('prestamo_valor', null, ['class'=>'form-control','placeholder'  =>  'valor prestamo']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-push-1 col-md-2">
            <div class="form-group">
                {!! Form::label('prestamo_tasa', 'Tasa % ') !!}
                {!! Form::Number('prestamo_tasa', null, ['class'=>'form-control','placeholder'  =>  'Tasa interes']) !!}
            </div>
        </div>
        <div class="col-md-push-5 col-md-3">
            <div class="form-group">
                {!! Form::label('prestamo_tipo', 'Tipo Prestamo') !!}
                {!! Form::select('prestamo_tipo', ['' => 'SELECCIONE UN TIPO', 'ABIERTO' => 'ABIERTO', 'CERRADO' => 'CERRADO'], null,  ['class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-push-1 col-md-3">
            <div class="form-group">
                {!! Form::label('prestamo_tiempo_cobro', 'Tiempo Prestamo') !!}
                {!! Form::select('prestamo_tiempo_cobro', ['' => 'SELECCIONE UN ESTADO', 'DIARIO' => 'DIARIO', 'SEMANAL' => 'SEMANAL', 'QUINCENAL' => 'QUINCENAL', 'MENSUAL' => 'MENSUAL'], null,  ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="col-md-push-4 col-md-2  ">
            <div class="form-group">
                {!! Form::label('prestamo_numero_cuotas', 'Numero de Cuotas') !!}
                {!! Form::Number('prestamo_numero_cuotas', null, ['class'=>'form-control', 'placeholder' =>   'Numero de Cuotas']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-push-1 col-md-3">
            <div class="form-group">
                {!! Form::label('prestamo_valor_cuota', 'Valor Cuota') !!}
                {!! Form::Number('prestamo_valor_cuota', null, ['class'=>'form-control', 'placeholder' =>   'Valor Cuota a Pagar', 'readonly' => 'true' ]) !!}
            </div>
        </div>
        <div class="col-md-push-4 col-md-3">
            <div class="form-group">
                {!! Form::label('prestamo_valor_total', 'Valor Total') !!}
                {!! Form::Number('prestamo_valor_total', null, ['class'=>'form-control', 'placeholder' =>   'Valor Total', 'readonly' => 'true']) !!}
            </div>
        </div>
    </div>
    </br>
</div>
<br>
<div class="container panel" id="design">
    <div class="row">
        <div class="col-md-push-1 col-md-2">
            <div class="form-group">
                {!! Form::label('prestamo_fecha', 'Fecha Prestamo') !!}
                {!! Form::date('prestamo_fecha', null, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="col-md-push-2 col-md-2">
            <div class="form-group">
                {!! Form::label('prestamo_fecha_inicial', 'Fecha inicio prestamo') !!}
                {!! Form::text('prestamo_fecha_inicial', null, ['class'=>'form-control', 'readOnly' => 'true']) !!}
            </div>
        </div>
        <div class="col-md-push-3 col-md-2">
            <div class="form-group">
                {!! Form::label('prestamo_fecha_proximo_cobro', 'Fecha proximo cobro') !!}
                {!! Form::text('prestamo_fecha_proximo_cobro', null, ['class'=>'form-control', 'readOnly' => 'true']) !!}
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-push-1 col-md-2">
                <div class="form-group">
                    {!! Form::label('prestamo_valor_proxima_cuota', 'Valor cancelar') !!}
                    {!! Form::Number('prestamo_valor_proxima_cuota', null, ['class'=>'form-control', 'placeholder' =>   'Valor próximo pago', 'readonly' => 'true']) !!}
                </div>
            </div>
            <div class="col-md-push-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('prestamo_valor_abonado', 'Valor abono deuda') !!}
                    {!! Form::Number('prestamo_valor_abonado', null, ['class'=>'form-control', 'placeholder' =>   'Valor abonado', 'readonly' => 'true']) !!}
                </div>
            </div>
            <div class="col-md-push-3 col-md-2">
                <div class="form-group">
                    {!! Form::label('prestamo_valor_actual', 'Valor deuda') !!}
                        {!! Form::Number('prestamo_valor_actual', null, ['class'=>'form-control', 'placeholder' =>   'Valor deuda', 'readonly' => 'true']) !!}
                </div>
            </div>
        </div>
    </div>
