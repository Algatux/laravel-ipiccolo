<?php

class AppointmentsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($clientid)
	{
		$appointment = new Appointment;
		$appointment->client_id = $clientid;
		$appointment->action = Input::get('action','colore');
		$appointment->description = Input::get('description','non definito');

		$date = Input::get('date',date('Y/m/d'));
		$date = explode("/",$date);
		if(strlen($date[0]) == 2)
			$date = array_reverse($date);

		$appointment->date = implode('-',$date);
		$appointment->save();

		return Response::json($appointment, 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}