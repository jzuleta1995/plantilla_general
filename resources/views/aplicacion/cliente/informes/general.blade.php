@extends('template.form')

@section('action', 'Crear usuario')

@section('content')
    <a href="{{ route('user.index') }}" class="btn btn-primary pull-right">Listado</a><hr>
    <!-- se incluye mensajes de erros -->
    @include('template.partials.error')
    <form class="form-horizontal" role="form">

    <div class="container">

        {!! Form::open(['route' => 'excel']) !!}

        <div class="form-group">
            {!! Form::label('cliente', 'Cliente', ['class' =>'col-lg-3 control-label']) !!}
            <div class="col-xs-3">
                <div class="col-lg-10">

                    {!! Form::hidden('cliente_id', null, ['class'=>'form-control', 'id' => 'cliente_id', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente']) !!}
                    {!! Form::text('cliente', null, ['class'=>'form-control', 'id' => 'cliente', 'value' => 'id', 'placeholder'  =>  'Nombre de cliente', 'size'    => 'S']) !!}
                </div>
            </div>
        </div>


            <div class="form-group">
                {!! Form::label('fecha_proximo_cobro', 'Fecha proximo cobro Desde:', ['class' =>'col-lg-3 control-label']) !!}
                <div class="col-xs-3">

                <div class="col-lg-10">
                   {!! Form::date('fecha_proximo_cobro', null, ['class'=>'form-control', 'placeholder' =>   'Documento fiador']) !!}
                </div>
                </div>

                {!! Form::label('fecha_proximo_cobro1', 'Hasta', ['class' =>'col-xs-1 control-label']) !!}
                    <div class="col-xs-3">

                    <div class="col-lg-10">

                     {!! Form::date('fecha_proximo_cobro1', null, ['class'=>'form-control', 'placeholder' =>   'Documento fiador','width'=>'2px']) !!}
                    </div>
                    </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                {!! Form::submit('ENVIAR',  ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
        {!! link_to_route('cliente.general',
              'Export to Excel', null,
              ['class' => 'btn btn-primary'])
        !!}

        {!! Form::close() !!}


    </div>
    </form>


    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label for="ejemplo_email_3" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
                <input type="email" class="form-control" id="ejemplo_email_3"
                       placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="ejemplo_password_3" class="col-lg-2 control-label">Contraseña</label>
            <div class="col-xs-3">

            <div class="col-lg-10">

                <input type="password" class="form-control" id="ejemplo_password_3"
                       placeholder="Contraseña">
            </div>
            </div>
            <label for="ejemplo_password_3" class="col-lg-1 control-label">hasta</label>

            <div class="col-xs-3">

                <div class="col-lg-10">


                    <input type="password" class="form-control" id="ejemplo_password_3"
                           placeholder="Contraseña">
                </div>
            </div>
        </div>

    </form>
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
            </script>
        @endsection

