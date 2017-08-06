@extends('template.form')

@section('action', 'Visor Cliente')

@section('content')
<div class="container"  >
    <div class="row">
        <div class="col-md-12 panel" id="formulario_uno">
            {!! Form::open(['route' => 'home', 'method'   =>  'GET']) !!}

           <!-- <p>
                <a id="paso_mostrar" href="" class="btn btn-primary">Mostrar</a>
            </p>-->


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

<div class="container" id="design">
    <table class="table table-hover table-striped table-condensed" >
        <thead>
        <th class="text-center">Cliente</th>
        <th class="text-center">Lugar de Trabajo</th>
        <th class="text-center">Fecha Cobro</th>
        <th class="text-center">Valor Cuota</th>
        <th class="text-center">Tasa %</th>
        </thead>

        <tbody>
            @foreach($prestamos as $prestamo)

                @if($prestamo->color =='AZUL')
                    <tr class="info">
                @elseif($prestamo->color =='ROSADO')
                    <tr class="success">
                @elseif($prestamo->color =='MORADO')
                    <tr class="warning">
                @elseif($prestamo->color =='ROJO')
                    <tr class="danger">
                @endif

                <td class="text-center" >{{ $prestamo->cliente_nombre_completo }}</td>
                <td class="text-center">{{ $prestamo->cliente_lugar_trabajo }}</td>
                <td class="text-center">{{ $prestamo->prestamo_fecha_proximo_cobro }}</td>
                <td class="text-center">{{ $prestamo->prestamo_valor_proxima_cuota }}</td>
                 <td class="text-center">{{ $prestamo->prestamo_tasa }} %</td>
                <td class="text-center">

                    <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$prestamo -> id}}')">Anular Prestamo</button>
                </td>

                </tr>
            @endforeach

        </tbody>

    </table>

    <!-- Edit Modal start -->
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('admin/prestamo/view')}}">

    <div class="modal fade" id="editModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/prestamo/updateAnulaPrestamo') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-group">
                                <label for="edit_cliente">cliente:</label>
                                <input type="text" class="form-control" id="edit_cliente" name="edit_cliente" readonly="true">
                            </div>
                            <div class="form-group">
                                <label for="edit_observacion">Observacion:</label>
                                <input type="text" class="form-control" id="edit_observacion" name="edit_observacion">
                            </div>
                        </div>

                        <input type="hidden" id="edit_id" name="edit_id">

                        <button type="button" onclick="fun_save()" class="btn btn-default">Modificar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>

        </div>
    </div>
    <!-- Edit code ends -->

</div>
@endsection
@section('script')
    <script src="{{asset('js/modal/anula_prestamo.js')}}"></script>


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
