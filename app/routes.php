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

// Clients
Route::get('client/all',array('as'=>'client-all','uses'=>'ClientController@index'));
Route::get('client/profile/{clientid}',array('as'=>'client-profile','uses'=>'ClientController@clientProfile'));
Route::get('client/delete/{clientid}',array('as'=>'client-delete','uses'=>'ClientController@deleteClient'));
Route::get('client/new',array('as'=>'client-add','uses'=>'ClientController@clientInsert'));

Route::post('client/search', array('as'=>'client-all','uses'=>'ClientController@search'));
Route::post('client/add',array('before' => 'csrf','as'=>'client-add','uses'=>'ClientController@clientAdd'));
Route::post('client/update/{clientid}',array('as'=>'client-update','uses'=>'ClientController@clientUpdate'));