<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAllocationsTable extends Migration {

	public function up()
	{
		Schema::create('allocations', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('tenant_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('household_id')->unsigned();
			$table->integer('plan_id')->unsigned();
			$table->integer('admin_id')->unsigned();
			$table->integer('status');
			$table->date('start_at');
			$table->date('end_at');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('allocations');
	}
}