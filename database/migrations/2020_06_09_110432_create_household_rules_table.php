s<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHouseholdRulesTable extends Migration {

	public function up()
	{
		Schema::create('household_rules', function(Blueprint $table) {
			$table->integer('household_id')->unsigned();
			$table->increments('id');
			$table->text('description');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('household_rules');
	}
}
