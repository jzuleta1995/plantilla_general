
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
            {!! Form::label('valor_prestamo', 'Valor ') !!}
            {!! Form::text('valor_prestamo', null, ['class'=>'form-control','placeholder'  =>  'valor prestamo']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('tasa', 'Tasa % ') !!}
            {!! Form::text('tasa', null, ['class'=>'form-control','placeholder'  =>  'Porcentaje Prestamo']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('tipo_prestamo', 'Tipo Prestamo') !!}
            {!! Form::select('tipo_prestamo', ['' => 'Seleccione un Estado', 'ABIERTO' => 'ABIERTO', 'CERRADO' => 'CERRADO'], null,  ['class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('tiempo_cobro', 'Tiempo Prestamo') !!}
            {!! Form::select('tiempo_cobro', ['' => 'Seleccione un Estado', 'DIARIO' => 'DIARIO', 'SEMANAL' => 'SEMANAL', 'QUINCENAL' => 'QUINCENAL', 'MENSUAL' => 'MENSUAL', 'OTRO' => 'OTRO'], null,  ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('cantidad_cuotas_pagar', 'Numero de Cuotas') !!}
            {!! Form::text('cantidad_cuotas_pagar', null, ['class'=>'form-control', 'placeholder' =>   'Numero de Cuotas']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('valor_cuota_pagar', 'Valor Cuota') !!}
            {!! Form::text('valor_cuota_pagar', null, ['class'=>'form-control', 'placeholder' =>   'Valor Cuota a Pagar']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('valor_total_prestamo', 'Valor Total') !!}
            {!! Form::text('valor_total_prestamo', null, ['class'=>'form-control', 'placeholder' =>   'Valor Total']) !!}
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('estado', 'Estado del prestamo') !!}
            {!! Form::select('estado', ['' => 'Seleccione un Estado', 'ABIERTO' => 'ABIERTO', 'CERRADO' => 'CERRADO'], null,  ['class'=>'form-control']) !!}
        </div>
    </div>
</div>
</br>
<!-- detalle -->

<div id="exTab2" class="container">
    <ul class="nav nav-tabs">
        <li class="active">
            <a  href="#1" data-toggle="tab">Fecha Pagos</a>
        </li>
        <li><a href="#2" data-toggle="tab">Saldo</a>
        </li>
    </ul>

    <!-- TABS NUMERO 1 -->

    <div class="tab-content ">
        <div class="tab-pane active" id="1">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('fecha_prestamo', 'Fecha Prestamo') !!}
                        {!! Form::date('fecha_prestamo', null, ['class'=>'form-control', 'placeholder' =>   'Nombre fiador']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('fecha_inicio_prestamo', 'Fecha inicio prestamo') !!}
                        {!! Form::date('fecha_inicio_prestamo', null, ['class'=>'form-control', 'placeholder' =>   'Fecha Inicio prestamo']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('fecha_proximo_cobro', 'Fecha proximo cobro') !!}
                        {!! Form::date('fecha_proximo_cobro', null, ['class'=>'form-control', 'placeholder' =>   'Documento fiador']) !!}
                    </div>
                </div>
            </div>

        <div class="tab-pane" id="2">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('valor_total_deuda', 'Valor total deuda') !!}
                        {!! Form::text('valor_total_deuda', null, ['class'=>'form-control', 'placeholder' =>   'valor total deuda']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('valor_abono_deuda', 'Valor abono deuda') !!}
                        {!! Form::text('valor_abono_deuda', null, ['class'=>'form-control', 'placeholder' =>   'Valor abono deuda']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('valor_proximo_pago_deuda', 'Valor cancelar') !!}
                        {!! Form::text('valor_proximo_pago_deuda', null, ['class'=>'form-control', 'placeholder' =>   'Valor proximo pago deuda']) !!}
                    </div>
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
