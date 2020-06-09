<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfileHobbiesTable extends Migration {

	public function up()
	{
		Schema::create('profile_hobbies', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('profile_id')->unsigned();
			$table->string('description');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('profile_hobbies');
	}
}