@extends('template.form')

@section('action', 'Informe Clientes')

@section('content')
    <!-- se incluye mensajes de erros -->
    <div class="container panel" id="design">

        @include('template.partials.error')
        {!! Form::open(['route' => 'excel.informeCliente']) !!}

        <br>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('cliente', 'Cliente:') !!}
                    {!! Form::hidden('cliente_id', null, ['class'=>'form-control', 'id' => 'cliente_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente']) !!}
                    {!! Form::text('cliente', null, ['class'=>'form-control', 'id' => 'cliente', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('fecha_proximo_cobro', 'Fecha proximo cobro Desde:') !!}
                    {!! Form::date('fecha_proximo_cobro', null, ['class'=>'form-control']) !!}

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('fecha_proximo_cobro1', 'Hasta:') !!}
                    {!! Form::date('fecha_proximo_cobro1', null, ['class'=>'form-control']) !!}

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

  <!--  <script type="text/javascript">
        $( "#cliente" ).autocomplete({
            source:'{!! route('autocomplete', ['ruta'   =>  'cliente'])!!}',
            minlength:1,
            autoFocus:true,
            select:function(e,ui)
            {
                $('#cliente').val(ui.item.id);
                $('#cliente_id').val(ui.item.id);
            }
        });
    </script>-->
@endsection

