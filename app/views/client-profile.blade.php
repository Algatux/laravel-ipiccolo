@extends('layouts.main')

	@section('scripts')
		@parent
		<script type="text/javascript" src="{{ asset('assets/js/client-profile.js') }}"></script>
	@stop

	@section('buttons')
		<li class="add-nota" id="add-taglio">
	        <a href="#"><span class="glyphicon glyphicon-plus"></span> Taglio/Colore</button></a>
	    <li>
		<li class="modify" id="modify-client">
	        <a href="#"><span class="glyphicon glyphicon-pencil"></span> Modifica</button></a>
	    <li>
	    <li class="delete" id="delete-client">
	        <a href="#"><span class="glyphicon glyphicon-trash"></span> Elimina</a>
	    <li>
	@stop

	@if (Session::has('message'))
		@section('message')
			<div class="alert alert-success fade in top-50 pos-fixed max-width">
		        <b>Messaggio:</b> {{ Session::get('message') }} <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    </div>
		@stop
	@endif

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
			<ul class="list-group">
			  	@foreach ($client->appointments as $app)
					<li class="list-group-item">
						
						<h4 class="list-group-item-heading">
						{{{ ucfirst($app->action) }}}
						<small> - {{ $app->created_at->format('d/m/Y')}}</small>
						<button class="btn btn-danger pull-right">Delete</button>
						</h4>
						<p class="list-group-item-text">{{{ $app->description}}}</p>
						
					</li>
				@endforeach
			</ul>
		</div>
	@stop

	@section('modal')
		<!-- Modal -->
		<div class="modal fade" id="modal-taglio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Nuovo Taglio/Colore</h4>
		      </div>
		      <div class="modal-body">
		      	{{ Form::open(array('action'=>'ClientController@clientAdd', 'id'=>'client-form', 'role'=>'form')) }}

		      		<div class="form-element input-group input-group-sm">
		      			<select name="action" class="form-control" style="width: 250px;">
		      				<option value="colore">Colore</option>
		      				<option value="taglio">Taglio</option>
		      			</select>
		      		</div>

		      		<div class="form-element input-group input-group-sm">
		      				<span class="input-group-addon">Data</span>
							<input type="text" name="date" class="form-control" placeholder="Data" value="{{ date('d/m/y') }}">
							<span class="input-group-addon"></span>
		      		</div>

					<div class="form-element input-group input-group-sm">
						<span class="input-group-addon">Descrizione</span>
						<input type="text" name="description" class="form-control" placeholder="Inserisci le tue note">
						<span class="input-group-addon"></span>
					</div>  

			    {{ Form::close() }}
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default closeAction" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary saveAction">Salva</button>
		      </div>
		    </div>
		  </div>
		</div>
	@stop