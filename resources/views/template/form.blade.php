<!DOCTYPE html>
<html>
<head>
	<title>Appname - @yield('title', 'ejemplo')</title>
	<meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<!-- iconos-->

	<link href="{{ asset('css/bootstrap.min.css')  }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">
	<link rel="stylesheet" href="{{ asset('css/jquery-ui.css')  }}" >

	<script src="{{ asset('jquery/jquery-1.9.1.min.js')  }}" ></script>
	<script src="{{ asset('jquery/jquery-1.9.1.min.js')  }}" ></script>
</head>
<body>
@include('template.partials.nav')
<div class="container">
	<h3>@yield('action' , 'ejemplo')</h3>
	<hr>
	<section>
		@yield('content')
	</section>
</div>
	<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
	<script type="text/javascript" src="{{ asset('jquery/jquery-3.2.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('jquery/jquery-ui.js')  }}"></script>
@yield('script')

<!--libreria confirm -->


</body>

</html>