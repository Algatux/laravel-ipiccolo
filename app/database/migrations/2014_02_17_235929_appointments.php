<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Appointments extends Migration {

	/**
	 * Run the migrations
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appointments',function(Blueprint $table){
			$table->increments('id');
			$table->unsignedInteger('client_id');
			$table->enum('action',array('taglio','colore'))->default('colore');
			$table->date('date');
			$table->text('description');
			$table->softDeletes();
			$table->timestamps();
			$table->index('client_id');
			$table->foreign('client_id')->references('id')->on('clients')
					->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('appointments');
	}

}
