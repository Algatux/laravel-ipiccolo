<?php

class ClientsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('clients')->delete();

		Client::create(array('name'=>"Alessandro",'surname'=>'Galli','phone'=>'036258****','nikname'=>'Algatux'));
		Client::create(array('name'=>"Laura",'surname'=>'Galli','phone'=>'036258****'));
		Client::create(array('name'=>"Giovanni",'surname'=>'Galli','phone'=>'036258****'));
		Client::create(array('name'=>"Ornella",'surname'=>'Ornaghi','phone'=>'036258****'));
		Client::create(array('name'=>"Andrea",'surname'=>'Mattia','nikname'=>'Mat'));

		// for($i=1;$i<2000;$i++)
		// 	Client::create(array('name'=>"{$i}nome",'surname'=>'{$i}','nikname'=>'{$i}'));
	}

}
