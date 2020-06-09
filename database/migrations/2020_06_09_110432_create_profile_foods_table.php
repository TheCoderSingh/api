<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfileFoodsTable extends Migration {

	public function up()
	{
		Schema::create('profile_foods', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('profile_id')->unsigned();
			$table->integer('food_id')->unsigned();
			$table->integer('preference');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('profile_foods');
	}
}