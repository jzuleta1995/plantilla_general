@extends('template.form')

@section('action', 'Informe Cobradores')

@section('content')
    <!-- se incluye mensajes de erros -->
    <div class="container panel" id="design">

        @include('template.partials.info')
        {!! Form::open(['route' => 'excel.informeCobrador']) !!}

        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('cobrador', 'Cobrador:') !!}
                    {!! Form::hidden('cobrador_id', null, ['class'=>'form-control', 'id' => 'cobrador_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cobrador']) !!}
                    {!! Form::text('cobrador', null, ['class'=>'form-control', 'id' => 'cobrador', 'value' => 'id', 'placeholder'  =>  'Nombre de cobrador']) !!}
                </div>
            </div>
            <div class="col-md-3  col-md-offset-1">
                <div class="form-group">
                    {!! Form::label('fecha_inicial', 'Desde:') !!}
                    {!! Form::date('fecha_inicial', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('fecha_final', 'Hasta:') !!}
                    {!! Form::date('fecha_final', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}

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
@endsection

