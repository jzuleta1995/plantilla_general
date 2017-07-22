@extends('template.form')

@section('action', 'Pago prestamo al cliente ' . $cliente->cliente_nombre_completo)

@section('content')
    <div class="container panel" id="design">

        {!! Form::open(['route' => 'abono.store', 'method'   =>  'POST']) !!}
            <div class="row">
                <div class="col-md-push-2 col-md-4">
                    <div class="form-group">
                        {!! Form::label('cliente', 'Cliente') !!}
                        {!! Form::hidden('cliente_id', $cliente->id, ['class'=>'form-control', 'id' => 'cliente_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente']) !!}
                        {!! Form::hidden('prestamo_id', $prestamo->id, ['class'=>'form-control', 'id' => 'prestamo_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente']) !!}
                        {!! Form::text('cliente', $cliente->cliente_nombre_completo, ['class'=>'form-control', 'id' => 'cliente', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente', 'readOnly' => 'true']) !!}
                    </div>
                </div>
                <div class="col-md-push-3 col-md-3">
                    <div class="form-group">
                        {!! Form::label('abono_valor_cuota', 'Valor A Pagar ') !!}
                        {!! Form::text('abono_valor_cuota', $prestamo->prestamo_valor_cuota, ['class'=>'form-control','placeholder'  =>  'Valor cuota' , 'readOnly' => 'true']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-push-2  col-md-3">
                    <div class="form-group">
                        {!! Form::label('abono_valor', 'Valor Abono') !!}
                        {!! Form::text('abono_valor', null, ['class'=>'form-control', 'placeholder' =>   'Valor Abono']) !!}
                    </div>
                </div>
                <div class="col-md-push-4 col-md-3">
                    <div class="form-group">
                        {!! Form::label('abono_tipo_pago', 'Tipo Pago') !!}
                        {!! Form::select('abono_tipo_pago', ['' => 'SELECCIONE UN TIPO', 'ABONO DEUDA' => 'ABONO DEUDA', 'ABONO CAPITAL' => 'ABONO CAPITAL', 'PAGO' => 'PAGO'], null,  ['class'=>'form-control']) !!}
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-push-2 col-md-2">
                    <div class="form-group">
                        {!! Form::label('abono_fecha', 'Fecha abono') !!}
                        {!! Form::date('abono_fecha', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-push-5 col-md-3">
                    <div class="form-group">
                        {!! Form::hidden('abono_estado', 'ACTIVO', ['class'=>'form-control']) !!}
                        {!! Form::label('abono_observacion', 'Observación') !!}
                        {!! Form::textArea('abono_observacion', null, ['class'=>'form-control', 'placeholder' =>   'Observación', 'rows' => '5']) !!}
                    </div>
                </div>
            </div>
            </br>
            <br>
            <div class="row">
                <div class="col-md-push-2 col-md-6">
                    {!! Form::submit('ENVIAR',  ['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
        <br>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/autocomplete.js') }}"></script>
    <script>autocompleteClass.autocompleteComponent('#cliente', '#cliente_id', 'cliente');</script>
@endsection