<nav class="navbar navbar-inverse" role="navigation">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home"></span> </a></li>
                <li><a class="nav-link" href="{{ route('cliente.index') }}">Cliente</a></li>
                <li><a class="nav-link nav-header" href="{{ route('cobrador.index') }}">Cobrador</a>
                <li><a class="nav-link" href="{{ route('prestamo.index') }}">Prestamo</a></li>
                @if(Auth::user()->tipo == 'ADMINISTRADOR')
                    <li><a class="nav-link" href="{{ route('prestamo.utilidad') }}">Visor Utilidad</a></li>
                    <li><a class="nav-link" href="{{ route('user.index') }}">Usuario</a></li>
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('excel.indexInformeCliente') }}">Informe Clientes</a></li>
                        <li><a class="nav-link" href="{{ route('excel.indexInformeCobrador') }}">Informe Cobradores</a></li>
                        <li><a class="nav-link" href="{{ route('excel.indexInformeUsuario') }}">Informe Usuario</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Procedimientos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('cobrador.indexAsignaCobradorACliente') }}">Asignar Clientes a Cobrador</a></li>
                        <li><a class="nav-link" href="{{ route('excel.indexInformeCobrador') }}">Informe Cobradores</a></li>

                        <!--<li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>-->
                    </ul>
                </li>

               <!-- <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span> Sign Up</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>-->
            @if (Auth::guest())
                <!-- <li><a href="{{ route('login') }}">Ingresar</a></li>
                            <li><a href="{{ route('register') }}">Registrar</a></li> -->
             @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="glyphicon glyphicon-user"></span> {{ Auth::user()->nombre }}
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a class="nav-link" href="{{ route('user.indexcambioClave') }}">Cambio Clave</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}" class="nav-link"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Cerrar Sesión
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
             @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>