@extends('layouts.main')

	@section('scripts')
		@parent
		<script type="text/javascript" src="{{ asset('assets/js/client-list.js') }}"></script>
	@stop

	@section('buttons')
		<li class="add">
	        <a href="/client/new"><span class="glyphicon glyphicon-plus"></span> Aggiungi</button></a>
	    <li>
	@stop

	@section('content')
		<div class="welcome page-header">
			<h1>iPiccolo <small>Gestionale Clienti</small></h1>
			Nel database sono presenti {{ count($clients)}} clienti.
		</div>
		<div class="search-filter-box input-group">
			<span class="input-group-addon">Filtra Clienti</span>
			<input type="search" id="clients-filter" class="form-control" placeholder="inserisci un nome">
			<span class="input-group-addon clear-search" id="clear-search">X</span>
		</div>
		<div class="client-list">
			<div class="client template"></div>
			@foreach ($clients as $client)
				<div class="client" id="{{ $client->id }}" onClick="javascript:window.location.href='client/profile/{{ $client->id }}'">
					{{ $client->surname }} {{ $client->name }} {{ ($client->nikname) ? "<i>{".$client->nikname."}</i>" : '' }}
				</div>	
			@endforeach
		</div>
	@stop