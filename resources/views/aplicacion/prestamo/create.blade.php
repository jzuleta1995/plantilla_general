@extends('template.form')

@section('action', 'Crear prestamo')

@section('content')
    <div id="btn-list" class="container">
        <a href="{{ route('prestamo.index') }}" class="btn btn-primary pull-right">Listado</a>
    </div>
    <div class="container">
        {!! Form::open(['route' => 'prestamo.store', 'method'   =>  'POST']) !!}
          <div class="container panel" id="design">
              @include('aplicacion.prestamo.fragment.form')
            </div>
        </br>
            <div class="container">
                <div class="col-md-6">
                    {!! Form::submit('ENVIAR',  ['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
        <br>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/aplicacion/prestamo/prestamo.js') }}"></script>
    <script src="{{ asset('js/autocomplete.js') }}"></script>
    <script>autocompleteClass.autocompleteComponent('#cliente', '#cliente_id', 'cliente');</script>
@endsection
