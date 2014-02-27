<?php

/*
|--------------------------------------------------------------------------
| Route Pramaters Patterns
|--------------------------------------------------------------------------
*/

Route::pattern('id', '[0-9]+');
Route::pattern('clientid', '[A-Za-z0-9]+');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Home
Route::get('/', 'ClientController@index');

// Clients => client
Route::group(array('prefix'=>'client'), function(){

	Route::get('all',array('as'=>'client-all','uses'=>'ClientController@index'));
	Route::get('profile/{clientid}',array('as'=>'client-profile','uses'=>'ClientController@clientProfile'));
	Route::get('delete/{clientid}',array('as'=>'client-delete','uses'=>'ClientController@deleteClient'));
	Route::get('new',array('as'=>'client-add','uses'=>'ClientController@clientInsert'));
	Route::get('modify/{clientid}',array('as'=>'client-modify','uses'=>'ClientController@clientModify'));

	Route::post('search', array('as'=>'client-search','uses'=>'ClientController@search'));
	Route::post('add',array('before' => 'csrf','as'=>'client-add','uses'=>'ClientController@clientAdd'));
	Route::post('update/{clientid}',array('as'=>'client-update','uses'=>'ClientController@clientUpdate'));

});


// Appointments => appointment
Route::group(array('prefix'=>'appointment'), function(){

	Route::post('add/{clientid}',array('before' => 'csrf','as'=>'app-add','uses'=>'AppointmentsController@addAppointment'));

});

// Database 
Route::group(array('prefix'=>'db'), function(){

	Route::get('export',array('as'=>'db-export','uses'=>'DatabaseController@export'));
	Route::get('import',array('as'=>'db-import','uses'=>'DatabaseController@import'));

	Route::post('import-execute',array('as'=>'db-import-execute','uses'=>'DatabaseController@importExecute'));

});
