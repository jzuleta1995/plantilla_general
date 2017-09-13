@extends('template.form')

@section('action', 'Informe visor Utilidad')

@section('content')
    <!-- se incluye mensajes de erros -->
    <div class="container panel" id="design">

        @include('template.partials.info')
        {!! Form::open(['route' => 'excel.informeVisorUtilidad']) !!}

        <br>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('cobrador', 'Cobrador:') !!}
                    {!! Form::hidden('cobrador_id', null, ['class'=>'form-control', 'id' => 'cobrador_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cobrador']) !!}
                    {!! Form::text('cobrador', null, ['class'=>'form-control', 'id' => 'cobrador', 'value' => 'id', 'placeholder'  =>  'Nombre de cobrador']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('abono_fecha', 'Fecha Creacion Abono Desde:') !!}
                    {!! Form::date('abono_fecha', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('abono_fecha1', 'Hasta:') !!}
                    {!! Form::date('abono_fecha1', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}

                </div>
            </div>
        </div>

        <div class="row">
            <br>
            <div class="col-md-6">
                {!! Form::submit('EXPORTAR EN EXCEL',  ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
        <br>

        {!! Form::close() !!}
    </div>

@endsection

@section('script')
    <script src="{{ asset('js/autocomplete.js') }}"></script>
    <script>autocompleteClass.autocompleteComponent('#cobrador', '#cobrador_id', 'cobrador');</script>
    <script>autocompleteClass.autocompleteComponent('#cliente', '#cliente_id', 'cliente');</script>

@endsection

