<?php

class Client extends Eloquent {

	protected $table = 'clients';

	protected $softDelete = true;

	public function appointments(){
		return $this->hasMany('Appointment')->orderby('created_at','DESC');
	}

}
