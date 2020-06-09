<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHouseholdActivitiesTable extends Migration {

	public function up()
	{
		Schema::create('household_activities', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('household_id')->unsigned();
			$table->string('description');
			$table->nullableMorphs('trigger');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('household_activities');
	}
}