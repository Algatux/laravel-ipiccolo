@extends('layouts.main')

	@section('buttons')
		<li class="">
	        <a href="javascript:history.back();"><span class="glyphicon glyphicon-arrow-left"></span> Annulla</button></a>
	    <li>
	@stop
	
	@section('content')
		<div class="welcome page-header">
			<h1>Database <small>Import</small></h1>
			Carica un salvataggio precedentemente esportato.
		</div>
		<div id="client-insert-form">
			{{ Form::open(array('route' => 'db-import-execute', 'files'=>true )) }}
				
				<p>{{ Form::file('upload') }}</p>	

				{{ Form::submit('Carica', array('class'=>'btn btn-primary')) }}

			{{ Form::close() }}
		</div>
	@stop