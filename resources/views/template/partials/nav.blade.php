<nav class="navbar navbar-default navbar-static-top" role="navigation">
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
                <li><a class="nav-link" href="{{ route('cliente.index') }}">Cliente</a></li>
                <li><a class="nav-link nav-header" href="{{ route('cobrador.index') }}">Cobrador</a>
                <li><a class="nav-link" href="{{ route('prestamo.index') }}">Prestamo</a></li>
                <li><a class="nav-link" href="{{ route('cobroPrestamo.index') }}">cobroPrestamo</a></li>
                <li><a class="nav-link" href="{{ route('prestamo.utilidad') }}">Visor Utilidad</a></li>
                <li><a class="nav-link" href="{{ route('excel.index') }}">Informe Clientes</a></li>

                <li><a class="nav-link" href="{{ route('user.index') }}">Usuario</a></li>
            @if (Auth::guest())
                <!-- <li><a href="{{ route('login') }}">Ingresar</a></li>
                            <li><a href="{{ route('register') }}">Registrar</a></li> -->
             @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->nombre }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}" class="nav-link"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
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