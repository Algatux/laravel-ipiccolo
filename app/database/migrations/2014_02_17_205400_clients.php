<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clients extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients',function(Blueprint $table){
			$table->increments('id');
			$table->string('name',32);
			$table->string('surname',32)->default('');
			$table->string('nikname',32)->nullable()->default(NULL);
			$table->string('phone',128)->nullable()->default(NULL);
			$table->string('mobilephone',128)->nullable()->default(NULL);
			$table->text('note')->nullable()->default(NULL);
			$table->softDeletes();
			$table->timestamps();
			$table->engine = 'InnoDB';
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clients');
	}

}
