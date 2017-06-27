<!DOCTYPE html>
<html>
<head>
	<title>Appname - @yield('title', 'ejemplo')</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" src="{{ asset('bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
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
@yield('script')
</body>

</html>