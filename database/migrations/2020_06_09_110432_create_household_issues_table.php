<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHouseholdIssuesTable extends Migration {

	public function up()
	{
		Schema::create('household_issues', function(Blueprint $table) {
			$table->integer('household_id')->unsigned();
			$table->integer('household_member_id')->unsigned();
			$table->string('description');
			$table->datetime('solved_at');
			$table->timestamps();
			$table->increments('id');
		});
	}

	public function down()
	{
		Schema::drop('household_issues');
	}
}