<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
<head>
	<meta charset="UTF-8">
	<title>iPiccolo Gest</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('packages/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
	<script type="text/javascript" src="{{ asset('assets/js/jquery-2.1.0.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('packages/bootstrap/js/bootstrap.min.js') }}"></script>
	@section('scripts')
		{{-- additional scripts --}}
	@show
</head>
<body>
	{{-- navigation --}}
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">iPiccolo</a>
	    </div>

	    	<ul class="nav navbar-nav navbar-left">
		        <li class="dropdown">
		          <a href="/"><span class="glyphicon glyphicon-home"></span> Home</a>
		        </li>
	    	</ul>

	      <ul class="nav navbar-nav navbar-right">
	      	@section('buttons')
				{{-- additional buttons --}}
			@show
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Database <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="#"><span class="glyphicon glyphicon glyphicon-cloud-download" /> Esporta</a></li>
	            <li><a href="#"><span class="glyphicon glyphicon glyphicon-cloud-upload" /> Importa</a></li>
	            <li class="divider"></li>
	            <li><a href="#">
	            	<button type="button" class="btn btn-danger">
						<span class="glyphicon glyphicon-trash" /> Svuota
				  	</button>
	            	</a>
	            </li>
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>
	{{-- end navigation --}}
	@section('message')
	
	@show
	<div class="container">
    	@yield('content')
    </div>
    @section('modal')
    
    @show
</body>
</html>