<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGuardianshipTable extends Migration {

	public function up()
	{
		Schema::create('guardianship', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('guardian_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('relation_type');
		});
	}

	public function down()
	{
		Schema::drop('guardianship');
	}
}