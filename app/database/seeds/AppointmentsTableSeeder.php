<?php

class AppointmentsTableSeeder extends Seeder {

	public function run()
	{

		DB::table('appointments')->delete();

		Appointment::create(array('client_id'=>'2','action'=>'colore','description'=>'colore','date'=>date('Y/m/d')));
		Appointment::create(array('client_id'=>'3','action'=>'taglio','description'=>'corto','date'=>date('Y/m/d')));
		Appointment::create(array('client_id'=>'4','action'=>'colore','description'=>'colore','date'=>date('Y/m/d')));
		Appointment::create(array('client_id'=>'1','action'=>'taglio','description'=>'cresta','date'=>date('Y/m/d')));
		Appointment::create(array('client_id'=>'2','action'=>'taglio','description'=>'lungo','date'=>date('Y/m/d')));
		Appointment::create(array('client_id'=>'2','action'=>'colore','description'=>'colore','date'=>date('Y/m/d')));
		Appointment::create(array('client_id'=>'3','action'=>'taglio','description'=>'corto','date'=>date('Y/m/d')));
		Appointment::create(array('client_id'=>'4','action'=>'taglio','description'=>'medio','date'=>date('Y/m/d')));
	}

}
