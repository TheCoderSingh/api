<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHouseholdAnnouncementsTable extends Migration {

	public function up()
	{
		Schema::create('household_announcements', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('household_id')->unsigned();
			$table->integer('household_member_id')->unsigned();
			$table->text('content');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('household_announcements');
	}
}