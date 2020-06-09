<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountriesTable extends Migration {

	public function up()
	{
		Schema::create('countries', function(Blueprint $table) {
			$table->increments('id');
			$table->string('code', 2);
			$table->string('name');
			$table->string('numeric_code', 3);
			$table->integer('language_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('countries');
	}
}