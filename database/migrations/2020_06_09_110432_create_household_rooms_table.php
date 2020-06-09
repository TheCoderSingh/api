<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHouseholdRoomsTable extends Migration {

	public function up()
	{
		Schema::create('household_rooms', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('household_id')->unsigned();
			$table->string('name');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('household_rooms');
	}
}