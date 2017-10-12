@extends('template.form')
@section('action', 'Visor Principal')
@section('content')
<div class="container"  >
    <div class="row">
        <p>
            <input class="btn btn-primary" type="button"  id="filtrar" value="FILTRAR" onclick="mostrarOcularFiltros()" >
            <input type="hidden" name="bandera" id="bandera" value="0">
        </p>
        <br>
        @include('template.partials.info')
        <div class="col-md-12 panel" id="formulario_uno" style="display:none">
            {!! Form::open(['route' => 'home', 'method'   =>  'GET', 'id' => 'formulario_general']) !!}
                <div class="row " id="principal">
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ Form::Label('cliente', 'Cliente') }}
                            {!! Form::hidden('cliente_id', null, ['class'=>'form-control', 'id' => 'cliente_id', 'value' => 'id', 'placeholder'  =>  'Nombre del Cliente']) !!}
                            {!! Form::text('cliente', null, ['class'=>'form-control', 'id' => 'cliente', 'value' => 'id', 'placeholder'  =>  'Nombre del Cliente', 'size'    => 'S']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ Form::Label('cobrador', 'Cobrador') }}
                            {!! Form::hidden('cobrador_id', null, ['class'=>'form-control', 'id' => 'cobrador_id', 'value' => 'id', 'placeholder'  =>  'Nombre del Cobrador']) !!}
                            {!! Form::text('cobrador', null, ['class'=>'form-control', 'id' => 'cobrador', 'value' => 'id', 'placeholder'  =>  'Nombre del Cobrador', 'size'    => 'S']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ Form::Label('lugar_trabajo', 'Lugar de Trabajo') }}
                            {{ Form::text('lugar_trabajo', null, ['class' => 'form-control' ,'placeholder' => 'Lugar de Trabajo del Cliente']) }}
                        </div>
                    </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                {{ Form::Label('tasa', 'Tasa %') }}
                                {{ Form::number('tasa', null, ['class' => 'form-control' ,'placeholder' => 'Tasa']) }}
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            {{ Form::Label('fecha_inicial', 'Fecha Inicial') }}
                            {{ Form::date('fecha_inicial', null, ['class' => 'form-control' ,'placeholder' => 'Fecha Inicial']) }}
                        </div>
                    </div>
                    <div class="col-md-2 col-md-offset-1">
                        <div class="form-group">
                            {{ Form::Label('fecha_final', 'Fecha Final') }}
                            {{ Form::date('fecha_final', null, ['class' => 'form-control' ,'placeholder' => 'Fecha Final']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::submit('ENVIAR',  ['class'=>'btn btn-primary']) !!}
                        <button  type="button" class="btn btn-primary" onclick="limpiar()" >LIMPIAR</button>
                    </div>
                </div>
                <br>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="container" id="design">
    <table class="table table-hover  table-condensed" >
        <thead>
        <th class="text-center">Cliente</th>
        <th class="text-center">Deuda</th>
        <th class="text-center">Lugar de Trabajo</th>
        <th class="text-center">Tasa %</th>
        <th class="text-center">Cuota del Mes</th>
        <th class="text-center">Fecha de Cobro</th>
        </thead>
        <tbody>
        <?php $valorTotal = 0;?>
            @if(is_object($prestamos))
                @foreach($prestamos as $prestamo)
                    @if($prestamo->color =='AZUL')
                        <tr bgcolor="#48BFFF">
                    @elseif($prestamo->color =='ROSADO')
                        <tr bgcolor="#FFBEBE">
                    @elseif(trim($prestamo->color) =='MORADO')
                        <tr bgcolor="#BD99FF">
                    @elseif(trim($prestamo->color) =='ROJO')
                        <tr bgcolor="#EE0707">
                    @endif
                            <td class="text-center" >{{ $prestamo->cliente_nombre_completo }}</td>
                            <td class="text-center">{{ $prestamo->prestamo_valor }}</td>
                            <td class="text-center">{{ $prestamo->cliente_lugar_trabajo }}</td>
                            <td class="text-center">{{ $prestamo->prestamo_tasa }} %</td>
                            <td class="text-center">{{ $prestamo->prestamo_utilidad_mes }}</td>
                            <td class="text-center">{{ $prestamo->prestamo_fecha_proximo_cobro }}</td>
                            <?php $valorTotal = $valorTotal + $prestamo->prestamo_utilidad_mes ;?>
                        @if( Auth::user()->tipo == 'ADMINISTRADOR')
                            <td class="text-center">
                            <a class="btn btn-danger"   data-toggle="modal" data-target="#editModal" onclick="mostrarModalPrestamo('{{$prestamo -> id}}')"> <span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                      @endif
                    </tr>
                @endforeach
            @endif
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th class="text-center">Total Prestamo</th>
                    <th class="text-center"> <?php echo $valorTotal;?></th>
                    <td></td>
                </tr>
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
                    <h4 class="modal-title">Anular Prestamo</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/prestamo/updateAnulaPrestamo') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-group">
                                <label for="edit_cliente">Cliente:</label>
                                <input type="text" class="form-control" id="edit_cliente" name="edit_cliente" readonly="true">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="***********" >
                            </div>
                            <div class="form-group">
                                <label for="edit_observacion">Observacion:</label>
                                <input type="text" class="form-control" id="edit_observacion" name="edit_observacion" >
                            </div>
                        </div>

                        <input type="hidden" id="edit_id" name="edit_id">

                        <button type="button" onclick="AnularPrestamo()" class="btn btn-primary">ANULAR</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="limpiarCampos()">CERRAR</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit code ends -->
</div>
@endsection
@section('script')
    <script src="{{asset('js/aplicacion/prestamo/anula_prestamo.js')}}"></script>
    <script src="{{asset('js/aplicacion/general/filtrosVisorPrincipal.js')}}"></script>
    <script src="{{ asset('js/autocomplete.js') }}"></script>
    <script>autocompleteClass.autocompleteComponent('#cliente', '#cliente_id', 'cliente');</script>
    <script>autocompleteClass.autocompleteComponent('#cobrador', '#cobrador_id', 'cobrador');</script>
    <script src="{{ asset('js/Home.js') }}"></script>
@endsection
