<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipsTable extends Migration {

	public function up()
	{
		Schema::create('tips', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('tenant_id')->unsigned();
			$table->string('content');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('tips');
	}
}