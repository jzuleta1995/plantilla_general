@extends('template.form')

@section('action', 'Informe Usuarios')

@section('content')
    <!-- se incluye mensajes de erros -->
    <div class="container panel" id="design">

        @include('template.partials.error')
        {!! Form::open(['route' => 'excel.informeUsuario']) !!}

        <br>
       <!-- <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('cliente', 'Cliente:') !!}
                    {!! Form::hidden('cliente_id', null, ['class'=>'form-control', 'id' => 'cliente_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente']) !!}
                    {!! Form::text('cliente', null, ['class'=>'form-control', 'id' => 'cliente', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente']) !!}
                </div>
            </div>
        </div>-->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('fecha_inicial', 'Fecha proximo cobro Desde:') !!}
                    {!! Form::date('fecha_inicial', \Carbon\Carbon::now(), ['class'=>'form-control' ]) !!}

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
    <script>autocompleteClass.autocompleteComponent('#cliente', '#cliente_id', 'cliente');</script>
@endsection

