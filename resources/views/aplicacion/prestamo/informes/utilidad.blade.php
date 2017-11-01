@extends('template.form')

@section('action', 'Visor Utilidad')

@section('content')
    <div class="container">
        <div class="row">
            <p>
                <input class="btn btn-primary" type="button"  id="filtrar" value="FILTRAR" onclick="mostrarOcularFiltros()" >
                <input type="hidden" name="bandera" id="bandera" value="0">
            </p>
            <br>
            @include('template.partials.info')
            <div class="col-md-12 panel" id="formulario_uno" style="display:none">
                {!! Form::open(['route' => 'prestamo.utilidad', 'method'   =>  'GET', 'id' => 'formulario_general']) !!}

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
        <table class="table table-hover table-striped" >
            <thead>
            <th class="text-center">Cobrador</th>
            <th class="text-center">Cliente</th>
            <th class="text-center">Fecha Abono</th>
            <th class="text-center">Couta Pagada</th>
            <th class="text-center">Capital Pagado</th>
            <th class="text-center">Interes Pagado %</th>
            <th class="text-center">Valor Estimado Mes En PagoInteres %</th>

            </thead>

            <tbody>
            <?php $totalValorRealPagado = 0;
                  $totalValorCapital    = 0 ;
                  $totalValorInteres    = 0;?>

            @foreach($prestamos as $prestamo)

                <tr>
                    <td class="text-center">{{ $prestamo->cobrador }}</td>
                    <td class="text-center">{{ $prestamo->cliente }}</td>
                    <td class="text-center">{{ $prestamo->fecha_cobroprestamo }}</td>
                    <td class="text-center">{{ $prestamo->valor_real_pagado }}</td>
                    <td class="text-center">{{ $prestamo->valor_pagado_a_capital }}</td>
                    <td class="text-center">{{ $prestamo->valor_pagado_a_interes }} %</td>

                    <?php $totalValorRealPagado = $totalValorRealPagado + $prestamo->valor_real_pagado;
                          $totalValorCapital    = $totalValorCapital + $prestamo->valor_pagado_a_capital ;
                          $totalValorInteres    = $totalValorInteres + $prestamo->valor_pagado_a_interes;?>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <th class="text-center">Total Utilidad</th>
                <th class="text-center"><?php echo $totalValorRealPagado;?></th>
                <th class="text-center"><?php echo $totalValorCapital;?></th>
                <th class="text-center"> <?php echo $totalValorInteres;?> %</th>
                @if(is_object($utilidad_total))
                    @foreach($utilidad_total as $utilidad)

                        <th class="text-center"> {{$utilidad->valor_total}}</th>
                    @endforeach

                @endif

            </tr>


            </tbody>

        </table>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/aplicacion/general/filtrosVisorPrincipal.js')}}"></script>
    <script src="{{ asset('js/autocomplete.js') }}"></script>
    <script>autocompleteClass.autocompleteComponent('#cobrador', '#cobrador_id', 'cobrador');</script>
    <script>autocompleteClass.autocompleteComponent('#cliente', '#cliente_id', 'cliente');</script>
@endsection
