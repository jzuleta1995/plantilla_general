<!DOCTYPE html>
<html>
<head>
	<title>Appname - @yield('title', 'ejemplo')</title>
	<meta charset="utf-8">
	<!-- iconos-->
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet"  href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script  src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
	<script " src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
	<script src="{{ asset('jquery/bootstrap.min.js') }}"></script>
	<script src="{{ asset('jquery/run_prettify.js') }}">
	<script type="text/javascript" src="{{ asset('js/jquery.confirm.js') }}"></script></script>-->

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