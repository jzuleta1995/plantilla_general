@extends('template.form')

@section('action', 'Crear usuario')

@section('content')
    <a href="{{ route('user.index') }}" class="btn btn-primary pull-right">Listado</a><hr>
    <!-- se incluye mensajes de erros -->
    @include('template.partials.error')

    <div class="container">
        {!! Form::open(['route' => 'excel.index']) !!}
        <div class="input-group">
            {!! Form::label('cliente', 'Cliente') !!}
            {!! Form::hidden('cliente_id', null, ['class'=>'form-control', 'id' => 'cliente_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente']) !!}
            {!! Form::text('cliente', null, ['class'=>'form-control', 'id' => 'cliente', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente', 'size'    => 'S']) !!}
        </div>

        <div class="col-xs-3">
            <div class="form-group">
                {!! Form::label('fecha_proximo_cobro', 'Fecha proximo cobro') !!}
                {!! Form::date('fecha_proximo_cobro', null, ['class'=>'form-control', 'placeholder' =>   'Documento fiador']) !!}
            </div>
        </div>

        <div class="col-xs-3">
            <div class="form-group">
                <div class="col-md-9">
                {!! Form::label('fecha_proximo_cobro1', 'Fecha proximo cobro') !!}
                {!! Form::date('fecha_proximo_cobro1', null, ['class'=>'form-control', 'placeholder' =>   'Documento fiador','width'=>'2px']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                {!! Form::submit('ENVIAR',  ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

        @section('script')

            <script type="text/javascript">
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
            </script>
        @endsection

