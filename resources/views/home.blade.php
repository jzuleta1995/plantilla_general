@extends('template.form')

@section('action', 'Visor Cliente')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 panel" id="formulario_uno">
            {!! Form::open(['route' => 'home', 'method'   =>  'GET']) !!}

           <!-- <p>
                <a id="paso_mostrar" href="" class="btn btn-primary">Mostrar</a>
            </p>-->


            <div class="container "  >
              <!--  <p>
                    <a id="paso_ocultar" href="" class="btn btn-primary">Ocultar</a>
                </p>-->
                <br>
                <div class="row " id="principal">
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ Form::Label('cliente', 'Cliente') }}
                            {!! Form::hidden('cliente_id', null, ['class'=>'form-control', 'id' => 'cliente_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente']) !!}
                            {!! Form::text('cliente', null, ['class'=>'form-control', 'id' => 'cliente', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente', 'size'    => 'S']) !!}

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ Form::Label('cobrador', 'Cobrador') }}
                            {!! Form::hidden('cobrador_id', null, ['class'=>'form-control', 'id' => 'cobrador_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente']) !!}
                            {!! Form::text('cobrador', null, ['class'=>'form-control', 'id' => 'cobrador', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente', 'size'    => 'S']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ Form::Label('lugar_trabajo', 'Lugar de Trabajo') }}
                            {{ Form::text('lugar_trabajo', null, ['class' => 'form-control' ,'placeholder' => 'Lugar Trabajo Cliente']) }}
                        </div>
                    </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::Label('tasa', 'Tasa %') }}
                                {{ Form::number('tasa', null, ['class' => 'form-control' ,'placeholder' => 'tasa']) }}

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
    <table class="table table-hover table-striped table-condensed" >
        <thead>
        <th>Cliente</th>
        <th>Lugar de Trabajo</th>
        <th>Fecha Cobro</th>
        <th>Valor Cuota</th>
        <th>Tasa %</th>
        </thead>

        <tbody>
            @foreach($prestamos as $prestamo)

                <tr>

                <td >{{ $prestamo->nombre }}</td>
                <td>{{ $prestamo->lugar_trabajo }}</td>
                <td>{{ $prestamo->fecha_proximo_cobro }}</td>
                <td>{{ $prestamo->valor_proximo_pago_deuda }}</td>
                    <td>{{ $prestamo->tasa }} %</td>

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

        /* funcion que oculta formulafio*/
        $('body').on('click', '#formulario_uno a', function (elemeto) {
            elemeto.preventDefault();

            //alert($(this).attr('id'))
            mostrar = $(this).attr('id');

            if( mostrar == 'paso_mostrar' ){
               $('#principal').show('hide');
            }else if( mostrar == 'paso_ocultar' ){
                $('#principal').hide('hide');
            }
        })
    </script>
@endsection
