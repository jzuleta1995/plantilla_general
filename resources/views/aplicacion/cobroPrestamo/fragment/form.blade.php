
<div class="row">
    <div class="col-md-6">
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
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('valor_pagar', 'Valor A Pagar ') !!}
            {!! Form::text('valor_pagar', null, ['class'=>'form-control','placeholder'  =>  'Valor cuota']) !!}
        </div>
    </div>
</div>
<div class="row">
     <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('valor_real_pagar', 'Valor real pagar') !!}
            {!! Form::text('valor_real_pagar', null, ['class'=>'form-control', 'placeholder' =>   'Valor real pagar']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('tipo_cobro', 'Tipo Cobro') !!}
            {!! Form::select('tipo_cobro', ['' => 'Seleccione un Estado', 'ABONO DEUDA' => 'ABONO DEUDA', 'ABONO CAPITAL' => 'ABONO CAPITAL', 'PAGO' => 'PAGO'], null,  ['class'=>'form-control']) !!}
        </div>
    </div>


</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('estado', 'Estado del cobro') !!} <br>
            {!! Form::text('estado', 'ACTIVO', ['class'=>'form-control', 'placeholder' =>   'Valor real pagar', 'readOnly' => 'false']) !!}

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('observacion', 'Observacion') !!}
            {!! Form::text('observacion', null, ['class'=>'form-control', 'placeholder' =>   'Observacion']) !!}
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
