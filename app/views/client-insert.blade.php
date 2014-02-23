@extends('layouts.main')

	@section('scripts')
		@parent
				<script type="text/javascript" src="{{ asset('packages/validation/jquery.validate.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/client-insert.js') }}"></script>
	@stop

	@section('buttons')
		<li class="">
	        <a href="javascript:history.back();"><span class="glyphicon glyphicon-arrow-left"></span> Annulla</button></a>
	    <li>
	@stop
	
	@section('content')
		<div class="welcome page-header">
			<h1>Nuovo Cliente <small>Inserimento</small></h1>
			Crea un nuovo cliente compilando il form.
		</div>
		<div id="client-insert-form">
			{{ Form::open(array('action'=>'ClientController@clientAdd', 'id'=>'client-form')) }}

				<div class="form-element input-group input-group-sm">
					<span class="input-group-addon">Nome</span>
					<input type="text" name="name" class="form-control" placeholder="Inserisci il nome">
					<span class="input-group-addon back"></span>
				</div>				

				<div class="form-element input-group input-group-sm">
					<span class="input-group-addon fixed-size-medium">Cognome</span>
					<input type="text" name="surname" class="form-control" placeholder="Inserisci il cognome">
					<span class="input-group-addon back"></span>
				</div>

				<div class="form-element input-group input-group-sm">
					<span class="input-group-addon fixed-size-medium">Soprannome</span>
					<input type="text" name="nikname" class="form-control" placeholder="Inserisci il soprannome, se ne possiede uno">
					<span class="input-group-addon back"></span>
				</div>

				<div class="form-element input-group input-group-sm">
					<span class="input-group-addon">Telefono</span>
					<input type="text" name="phone" class="form-control" placeholder="Inserisci un numero di telefono">
					<span class="input-group-addon back"></span>
				</div>

				<div class="form-element input-group input-group-sm">
					<span class="input-group-addon">Cellulare</span>
					<input type="text" name="mobilephone" class="form-control" placeholder="Inserisci un numero di cellulare">
					<span class="input-group-addon back"></span>
				</div>

				<div class="form-element input-group input-group-sm">
					<span class="input-group-addon">Note</span>
					<input type="text" name="note" class="form-control" placeholder="Inserisci eventuali note">
					<span class="input-group-addon back"></span>
				</div>

				{{ Form::submit('Salva', array('class'=>'btn btn-primary')) }}

			{{ Form::close() }}
		</div>
	@stop