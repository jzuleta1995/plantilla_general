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
                                {{ Form::Label('cobrador_quitar_cliente', 'Cobrador', ['class'  => 'form-required']) }}
                                {!! Form::hidden('cobrador_quitar_cliente_id', $cobrador != "" ? $cobrador->id : null, ['class'=>'form-control', 'id' => 'cobrador_quitar_cliente_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cobrador a retirar']) !!}
                                {!! Form::text('cobrador_quitar_cliente',$cobrador != "" ? $cobrador->cobrador_nombre_completo : null, ['class'=>'form-control', 'id' => 'cobrador_quitar_cliente', 'value' => 'id', 'placeholder'  =>  'Nombre del cobrador', 'size'    => 'S', 'required'  =>  'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        {!! Form::submit('CARGAR CLIENTES',  ['class'=>'btn btn-primary', 'id' => 'btnCargarClientes']) !!}
                        </div>
                    </div>
                <br>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="row hidden" id="visor_clientes">
            <div class="col-md-12 panel">
                {!! Form::open(['route' => 'cobrador.AsignaCobradorACliente' , 'method' => 'GET', 'id' => 'myform']) !!}

                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::Label('cobrador_asignar_cliente', 'Cobrador Asignar Clientes') }}
                        {!! Form::hidden('cobrador_asignar_cliente_id', null, ['class'=>'form-control', 'id' => 'cobrador_asignar_cliente_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cobrador a asignar']) !!}
                        {!! Form::text('cobrador_asignar_cliente', null, ['class'=>'form-control', 'id' => 'cobrador_asignar_cliente', 'value' => 'id', 'placeholder'  =>  'Nombre de cobrador a asignar', 'size'    => 'S', 'required' =>  'required']) !!}
                    </div>
                    <div>
                        {!! Form::hidden('cobrador_quitar_cliente_id', null, ['class'=>'form-control', 'id' => 'cobrador_quitar_cliente_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cobrador a retirar']) !!}
                    </div>
                </div>
                <table id="mytable" class="table table-bordered table-striped table-hover">
                   <input id="datos" name="datos" type="hidden" >

                    <thead>
                    <th><input  type="checkbox" name="checkbox_all" id="checkbox_all" value="0"></th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Documento</th>
                    </thead>

                    <tbody>

                        @if($clientes!='')
                          @foreach($clientes as $cliente)
                            <tr>
                                <td><input type="checkbox" name="checkbox_1" id="checkbox_1" value="{{ $cliente->id }}"></td>
                                <td> {{$cliente->cliente_nombre_completo}} </td>
                                <td> {{$cliente->cliente_documento}} </td>
                            </tr>
                           @endforeach
                        @endif

                    </tbody>

                </table>
                <div class="col-md-3    ">
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
    <script src=" {{  asset('js/aplicacion/cobrador/asignacobradoracliente.js') }}"></script>

@endsection
