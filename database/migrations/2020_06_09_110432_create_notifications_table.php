<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationsTable extends Migration {

	public function up()
	{
		Schema::create('notifications', function(Blueprint $table) {
			$table->increments('id');
			$table->morphs('notifiable');
			$table->string('content');
			$table->string('action');
			$table->datetime('read_at')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('notifications');
	}
}