<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfileTable extends Migration {

	public function up()
	{
		Schema::create('profile', function(Blueprint $table) {
			$table->increments('id');
			$table->morphs('profilable');
			$table->text('biography');
			$table->string('allergies');
			$table->timestamps();
			$table->date('birthdate');
			$table->integer('country_id')->unsigned();
			$table->integer('language_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('profile');
	}
}