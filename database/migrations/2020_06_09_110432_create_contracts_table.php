<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractsTable extends Migration {

	public function up()
	{
		Schema::create('contracts', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('household_id')->unsigned();
			$table->integer('tenant_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('contracts');
	}
}