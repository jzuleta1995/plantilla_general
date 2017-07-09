<!DOCTYPE html>
<html>
<head>
	<title>Appname - @yield('title', 'ejemplo')</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@yield('script')
</body>

</html>