<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfileContactsTable extends Migration {

	public function up()
	{
		Schema::create('profile_contacts', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('profile_id')->unsigned();
			$table->integer('type');
			$table->string('value');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('profile_contacts');
	}
}