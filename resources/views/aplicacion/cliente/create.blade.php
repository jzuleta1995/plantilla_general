@extends('template.form')

@section('action', 'Crear cliente')

@section('content')
    <div class="container panel">
        <br>
    <a href="{{ route('cliente.index') }}" class="btn btn-primary pull-right">Listado</a>
        </br></br>

    <!-- se incluye mensajes de erros -->
    @include('template.partials.error')

        {!! Form::open(['route' => 'cliente.store', 'method'   =>  'POST']) !!}
                @include('aplicacion.cliente.fragment.form')
        {!! Form::close() !!}
        <br>
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
