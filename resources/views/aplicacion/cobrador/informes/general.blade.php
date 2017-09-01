@extends('template.form')

@section('action', 'Informe Cobradores')

@section('content')
    <!-- se incluye mensajes de erros -->
    <div class="container panel">

        @include('template.partials.error')
        {!! Form::open(['route' => 'excel.informeCobrador']) !!}

        <br>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('cobrador', 'Cobrador:') !!}
                    {!! Form::hidden('cobrador_id', null, ['class'=>'form-control', 'id' => 'cobrador_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente']) !!}
                    {!! Form::text('cobrador', null, ['class'=>'form-control', 'id' => 'cobrador', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente']) !!}
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

    <script type="text/javascript">
        $( "#cobrador" ).autocomplete({
            source:'{!! route('autocomplete', ['ruta'   =>  'cobrador'])!!}',
            minlength:1,
            autoFocus:true,
            select:function(e,ui)
            {
                $('#cobrador').val(ui.item.id);
                $('#cobrador_id').val(ui.item.id);
            }
        });
    </script>
@endsection

