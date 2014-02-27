<?php

class AppointmentsController extends \BaseController {

	public function addAppointment($clientid)
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

	public function deleteAppointment($appid){
		$appointment = Appointment::findOrFail($appid);
		$clientid = $appointment->client_id;
		$appointment->delete();

		return Redirect::route('client-profile',$clientid);
	}

}