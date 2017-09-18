@extends('template.form')

@section('action', 'Cambio Cobrador A Clientes')

@section('content')
    @include('template.partials.info')
    <div class="container" id="design">
        <div class="row">
            <div class="col-md-12 panel">
                {!! Form::open(['route' => 'cobrador.CargarClienteCobrador' , 'method' => 'GET' ]) !!}

                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::Label('cobrador_quitar_cliente', 'Cobrador Quitar Clientes') }}
                                {!! Form::hidden('cobrador_quitar_cliente_id', null, ['class'=>'form-control', 'id' => 'cobrador_quitar_cliente_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente']) !!}
                                {!! Form::text('cobrador_quitar_cliente', null, ['class'=>'form-control', 'id' => 'cobrador_quitar_cliente', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente', 'size'    => 'S']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        {!! Form::submit('CARGAR CLIENTES',  ['class'=>'btn btn-primary']) !!}

                        <!--{!! link_to_route('cobrador.CargarClienteCobrador',
                                 'CARGAR CLIENTES', null,
                                 ['class' => 'btn btn-primary', 'method' => 'GET'])
                           !!}
                                <a href="{{ action("CobradorController@CargarClienteCobrador") }}">link</a>
                                <a href="{{ route("cobrador.CargarClienteCobrador") }}" methods="GET">link 222</a>-->
                        </div>
                    </div>
                <br>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 panel">
                {!! Form::open(['route' => 'cobrador.AsignaCobradorACliente' , 'method' => 'GET', 'id' => 'myform']) !!}

                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::Label('cobrador_asignar_cliente', 'Cobrador Asignar Clientes') }}
                        {!! Form::hidden('cobrador_asignar_cliente_id', null, ['class'=>'form-control', 'id' => 'cobrador_asignar_cliente_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente']) !!}
                        {!! Form::text('cobrador_asignar_cliente', null, ['class'=>'form-control', 'id' => 'cobrador_asignar_cliente', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente', 'size'    => 'S']) !!}
                    </div>
                </div>
                <table id="mytable" class="table table-bordered table-striped table-hover">
                   <input id="datos" name="datos" type="hidden" >

                    <thead>
                    <div class="checkbox">
                       <th><input  type="checkbox" name="checkbox_all" id="checkbox_all" value="0"></th>
                    </div>
                    <th class="text-center">Cliente</th>
                    </thead>

                    <tbody>

                        @if($clientes!='')
                          @foreach($clientes as $cliente)
                            <tr>
                                <td><input type="checkbox" name="checkbox_1" id="checkbox_1" value="{{ $cliente->id }}"></td>
                                <td> {{$cliente->cliente_nombre_completo}} </td>
                            </tr>
                           @endforeach
                        @endif

                    </tbody>

                </table>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::submit('ASIGNAR CLIENTES',  ['class'=>'btn btn-primary', 'id' => 'btn_cliente', 'method' => 'GET']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/autocomplete.js') }}"></script>
    <script>autocompleteClass.autocompleteComponent('#cobrador_quitar_cliente', '#cobrador_quitar_cliente_id', 'cobrador');</script>
    <script>autocompleteClass.autocompleteComponent('#cobrador_asignar_cliente', '#cobrador_asignar_cliente_id', 'cobrador');</script>

    <script type="text/javascript">

        $("#checkbox_all").click(function () {
            $("input:checkbox").prop('checked', $(this).prop('checked'));
        });

         $(document).ready(function() {

           $("#btn_cliente").click(function () {

               var codigos = "";

               $("input:checkbox:checked").each(

                   function() {
                       //alert("El checkbox con valor " + $(this).val() + " está seleccionado");

                       codigos = codigos  + $(this).val() + ",";
                       $('#datos').val(codigos);

                      // alert ("codigos" + codigos);
                   }
               );
            })
        });


    </script>

@endsection
