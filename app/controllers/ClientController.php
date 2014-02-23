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
			return View::make('client-profile', compact('client','message'));
	}

	public function clientInsert(){
		return View::make('client-insert');
	}

	public function clientAdd(){
		$client = new Client;
		$client->name = ucwords(strtolower(Input::get('name','undefined')));
		$client->surname = ucwords(strtolower(Input::get('surname','undefined')));
		$client->nikname = ucwords(strtolower(Input::get('nikname',NULL)));

		$client->phone = Input::get('phone',NULL);
		$client->mobilephone = Input::get('mobilephone',NULL);

		$client->note = Input::get('note',NULL);
		
		$client->save();
		return Redirect::to('client/profile/'.$client->id)->with('message', 'Cliente Aggiunto');
	}

	public function clientUpdate($clientid){
		$client = Client::findOrFail($clientid);
		return var_dump($client->toArray());
	}

	public function deleteClient($clientid){
		Client::findOrFail($clientid)->delete();
	}

}