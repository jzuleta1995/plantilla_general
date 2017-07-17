@extends('template.form')

@section('action', 'Visor Utilidad')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 panel">
                {!! Form::open(['route' => 'utilidadPrestamos.index']) !!}

                <div class="container">
                    <br>
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::Label('cobrador', 'Cobrador') }}
                                {!! Form::hidden('cobrador_id', null, ['class'=>'form-control', 'id' => 'cobrador_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente']) !!}
                                {!! Form::text('cobrador', null, ['class'=>'form-control', 'id' => 'cobrador', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente', 'size'    => 'S']) !!}
                            </div>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ Form::Label('fecha_inicial', 'Fecha Inicial') }}
                            {{ Form::date('fecha_inicial', null, ['class' => 'form-control' ,'placeholder' => 'Fecha Inicial']) }}

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ Form::Label('fecha_final', 'Fecha Final') }}
                            {{ Form::date('fecha_final', null, ['class' => 'form-control' ,'placeholder' => 'Fecha Final']) }}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::submit('ENVIAR',  ['class'=>'btn btn-primary']) !!}
                    </div>
                </div>
                <br>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </div>

    <div class="container">
        <table class="table table-hover table-striped" >
            <thead>
            <th>Cliente</th>
            <th>Lugar de Trabajo</th>
            <th>Fecha Cobro</th>
            <th>Valor Cuota</th>
            <th>Tasa %</th>
            </thead>

            <tbody>
            @foreach($utilidad as $prestamo)

                <tr>
                    <td>{{ $prestamo->cobrador }}</td>
                    <td>{{ $prestamo->cliente }}</td>
                    <td>{{ $prestamo->valor_real_pagar }}</td>
                    <td>{{ $prestamo->valor_pagado_a_capital }}</td>
                    <td>{{ $prestamo->valor_pagado_a_interes }} %</td>

                </tr>
            @endforeach

            </tbody>

        </table>
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
