    <div class="row">
        <div class="col-md-push-1 col-md-4">
            <div class="form-group">
                {!! Form::label('cliente', 'Cliente') !!}
                {!! Form::hidden('cliente_id', null, ['class'=>'form-control', 'id' => 'cliente_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente']) !!}
                @if(is_object($cliente))
                    {!! Form::text('cliente', $cliente->cliente_nombre_completo, ['class'=>'form-control', 'id' => 'cliente', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente', 'size'    => 'S']) !!}
                @else
                    {!! Form::text('cliente', null, ['class'=>'form-control', 'id' => 'cliente', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente', 'size'    => 'S', 'onblur' => 'validaUnicoPrestamoCliente()']) !!}
                @endif
            </div>
        </div>
        <div class="col-md-push-3 col-md-3">
            <div class="form-group">
                {!! Form::label('prestamo_tipo', 'Tipo Prestamo') !!}
                {!! Form::select('prestamo_tipo', ['' => 'SELECCIONE UN TIPO', 'ABIERTO' => 'ABIERTO', 'CERRADO' => 'CERRADO'], null,  ['class'=>'form-control', 'onblur' =>'mostrar()']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-push-1 col-md-2">
            <div class="form-group">
                {!! Form::label('prestamo_tiempo_cobro', 'Tiempo Prestamo') !!}
                {!! Form::select('prestamo_tiempo_cobro', ['' => 'SELECCIONE UN ESTADO', 'SEMANAL' => 'SEMANAL', 'QUINCENAL' => 'QUINCENAL', 'MENSUAL' => 'MENSUAL'], null,  ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="col-md-push-5 col-md-3">
            <div class="form-group">
                {!! Form::label('prestamo_valor', 'Valor ') !!}
                {!! Form::text('prestamo_valor', null, ['class'=>'form-control','placeholder'  =>  'valor prestamo', 'onkeyup' => 'format(this)', 'onchange' => 'format(this)']) !!}
             </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-push-1 col-md-3">
            <div class="form-group">
                {!! Form::label('prestamo_tasa', 'Tasa % ') !!}
                {!! Form::text('prestamo_tasa', null, ['class'=>'form-control','placeholder'  =>  'Tasa interes']) !!}
            </div>
        </div>

    @if(is_object($cliente))

        @if($prestamo->prestamo_tipo!='ABIERTO')
            <div class="col-md-push-4 col-md-2  ">
                <div class="form-group" id="numero_cuota">
                    {!! Form::label('prestamo_numero_cuotas', 'Numero de Cuotas') !!}
                    {!! Form::text('prestamo_numero_cuotas', null, ['class'=>'form-control', 'placeholder' =>   'Numero de Cuotas']) !!}
                </div>
            </div>
         @endif
            @else
            <div class="col-md-push-4 col-md-2  ">
                <div class="form-group" id="numero_cuota">
                    {!! Form::label('prestamo_numero_cuotas', 'Numero de Cuotas') !!}
                    {!! Form::text('prestamo_numero_cuotas', null, ['class'=>'form-control', 'placeholder' =>   'Numero de Cuotas']) !!}
                </div>
            </div>
            @endif
    </div>
    <div class="row">
        <div class="col-md-push-1 col-md-3">
            <div class="form-group">
                {!! Form::label('prestamo_valor_cuota', 'Valor Cuota') !!}
                {!! Form::text('prestamo_valor_cuota', null, ['class'=>'form-control', 'placeholder' =>   'Valor Cuota a Pagar', 'readonly' => 'true', 'onblur' => 'format(this)' ]) !!}
            </div>
        </div>
        <div class="col-md-push-4 col-md-3">
            <div class="form-group">
                {!! Form::label('prestamo_valor_total', 'Valor Total') !!}
                {!! Form::text('prestamo_valor_total', null, ['class'=>'form-control', 'placeholder' =>   'Valor Total', 'readonly' => 'true', 'onblur' => 'format(this)']) !!}
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
                {!! Form::date('prestamo_fecha_inicial', null, ['class'=>'form-control']) !!}
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
                    {!! Form::text('prestamo_valor_proxima_cuota', null, ['class'=>'form-control', 'placeholder' =>   'Valor próximo pago', 'readonly' => 'true',  'onblur' => 'format(this)']) !!}
                </div>
            </div>
            <div class="col-md-push-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('prestamo_valor_abonado', 'Valor abono deuda') !!}
                    {!! Form::text('prestamo_valor_abonado', null, ['class'=>'form-control', 'placeholder' =>   'Valor abonado', 'readonly' => 'true',  'onblur' => 'format(this)']) !!}
                </div>
            </div>
            <div class="col-md-push-3 col-md-2">
                <div class="form-group">
                    {!! Form::label('prestamo_valor_actual', 'Valor deuda') !!}
                        {!! Form::text('prestamo_valor_actual', null, ['class'=>'form-control', 'placeholder' =>   'Valor deuda', 'readonly' => 'true',  'onblur' => 'format(this)']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
