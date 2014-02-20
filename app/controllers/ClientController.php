<?php

class ClientController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = Client::orderBy('surname', 'ASC')
					->orderBy('name', 'ASC')->get();
		return View::make('client-list',compact('clients'));
	}

	public function search(){
		$searchParameter = Input::get('key');
		$searchParameter .= '%';

		$search = Client::where('name', 'LIKE', $searchParameter)
					->orWhere('surname', 'LIKE', $searchParameter)
					->orWhere('nikname', 'LIKE', $searchParameter)
					->orderBy('surname', 'ASC')
					->orderBy('name', 'ASC')->get();
		return Response::json($search);
	}

	public function clientProfile($clientid){
		$client = Client::findOrFail($clientid);
		$client->appointments;
		//var_dump($client->appointments->toArray());exit;
		if(Request::ajax())
			return Response::json($client->toArray());
		else
			return View::make('client-profile', compact('client'));
	}

	public function clientInsert(){
		return View::make('client-insert');
	}

	public function clientAdd(){
		$client = new Client;
		$client->name = Input::get('name','undefined');
		$client->surname = Input::get('surname','undefined');
		$client->phone = Input::get('phone',NULL);
		$client->mobilephone = Input::get('mobilephone',NULL);
		$client->save();
		return var_dump($client->toArray());
	}

	public function clientUpdate($clientid){
		$client = Client::findOrFail($clientid);
		return var_dump($client->toArray());
	}

	public function deleteClient($clientid){
		Client::findOrFail($clientid)->delete();
	}

}