@extends('template.form')

@section('action', 'Crear Cobro')

@section('content')
    <div class="container panel">
        <br>
    <a href="{{ route('cobroPrestamo.index') }}" class="btn btn-primary pull-right">Listado</a>
        </br></br>
        {!! Form::open(['route' => 'cobroPrestamo.store', 'method'   =>  'POST']) !!}
            @include('aplicacion.cobroPrestamo.fragment.form')
        {!! Form::close() !!}
        <br>
    </div>
@endsection
@section('script')

    <script type="text/javascript">
        $( "#cliente" ).autocomplete({
            source:'{!! route('autocomplete')!!}',
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