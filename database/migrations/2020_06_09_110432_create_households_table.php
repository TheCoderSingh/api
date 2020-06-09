<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHouseholdsTable extends Migration {

	public function up()
	{
		Schema::create('households', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('type');
			$table->string('address');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('households');
	}
}