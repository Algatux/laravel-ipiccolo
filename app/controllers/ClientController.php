<?php

class ClientController extends \BaseController {


	/*
	|--------------------------------------------------------------------------
	| GET REQUESTS
	|--------------------------------------------------------------------------
	*/
	
	// client/all
	public function index()
	{
		$clients = Client::orderBy('surname', 'ASC')
					->orderBy('name', 'ASC')->get();
		return View::make('client-list',compact('clients'));
	}

	// client/profile/{clientid}
	public function clientProfile($clientid){
		$client = Client::findOrFail($clientid);
		$client->appointments;
		//var_dump($client->appointments->toArray());exit;
		if(Request::ajax())
			return Response::json($client->toArray());
		else
			return View::make('client-profile', compact('client','message'));
	}

	// client/new
	public function clientInsert(){
		$client = new Client;
		$params = array(
				'route' => 'client-add',
				'title' => 'Nuovo Cliente',
				'subtitle' => 'Inserimento'
			);
		return View::make('client-form',$params)->with(compact('client'));
	}

	// client/modify/{clientid}
	public function clientModify($clientid){
		$client = Client::findOrFail($clientid);
		$params = array(
				'route' => 'client-update',
				'title' => $client->name." ".$client->surname,
				'subtitle' => 'Modifica'
			);
		return View::make('client-form',$params)->with(compact('client'));
	}

	// client/delete/{clientid}
	public function deleteClient($clientid){
		Client::findOrFail($clientid)->delete();
		return Redirect::route('client-all');
	}


	/*
	|--------------------------------------------------------------------------
	| POST REQUESTS
	|--------------------------------------------------------------------------
	*/

	// client/search
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

	// client/add
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

	// client/update/{clientid}
	public function clientUpdate($clientid){
		$client = Client::findOrFail($clientid);
		
		$client->name = ucwords(strtolower(Input::get('name',$client->name)));
		$client->surname = ucwords(strtolower(Input::get('surname',$client->surname)));
		$client->nikname = ucwords(strtolower(Input::get('nikname',$client->nikname)));

		$client->phone = Input::get('phone',$client->phone);
		$client->mobilephone = Input::get('mobilephone',$client->mobilephone);

		$client->note = Input::get('note',$client->note);

		$client->save();

		return Redirect::to('client/profile/'.$client->id)->with('message', 'Cliente Modificato');
	}

}