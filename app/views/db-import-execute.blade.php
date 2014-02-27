@extends('layouts.main')

	@section('buttons')
		<li class="">
	        <a href="javascript:history.back();"><span class="glyphicon glyphicon-arrow-left"></span> Annulla</button></a>
	    <li>
	@stop
	
	@section('content')
		<div class="welcome page-header">
			<h1>Resoconto <small>Import</small></h1>
		</div>
		<div id="resoconto">
			<p><b>Sono stati importati</b>  {{ $numero_clienti }} clienti</p>
			<p><b>Sono stati importati</b>  {{ $numero_app }} appuntamenti</p>
		</div>
	@stop