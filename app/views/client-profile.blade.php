@extends('layouts.main')

	@section('scripts')
		@parent
		<script type="text/javascript" src="{{ asset('assets/js/client-profile.js') }}"></script>
	@stop

	@section('buttons')
		<li class="modify" id="modify-client">
	        <a href="#"><span class="glyphicon glyphicon-pencil"></span> Modifica</button></a>
	    <li>
	    <li class="delete" id="delete-client">
	        <a href="#"><span class="glyphicon glyphicon-trash"></span> Elimina</a>
	    <li>
	@stop

	@section('content')
		<div class="page-header">
			<h1>{{ $client->name }} {{ ($client->nikname) ? "<i style=\"font-size:28px;\">{".$client->nikname."}</i>" : '' }} {{ $client->surname }} &nbsp; 
				<small style="font-size:14px;">
					<span class="glyphicon glyphicon-earphone" /> {{{ $client->phone or '---' }}} - 
					<span class="glyphicon glyphicon-phone" /> {{{ $client->mobilephone or '---'  }}}
				</small>
				@if (strlen($client->note))
					<p><small style="font-size:14px;">{{{ $client->note }}}</small></p>	
				@endif
			</h1>
		</div>
		<div class="appointments-list">
			<h4>Elenco Tagli / Colori</h4>
			<div class="appointment template"></div>
			@foreach ($client->appointments as $app)
				<div class="appointment">
					<span class="badge">{{ $app->created_at->format('d-m-Y')}}</span>
					<span class="badge blue-color">{{{ $app->action }}}</span>  
					{{{ $app->description}}}
				</div>	
			@endforeach
		</div>
	@stop