<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHouseholdMembersTable extends Migration {

	public function up()
	{
		Schema::create('household_members', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('household_id')->unsigned();
			$table->timestamps();
			$table->boolean('is_permanent')->default(false);
			$table->string('is_admin');
			$table->integer('user_id')->unsigned();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('household_members');
	}
}