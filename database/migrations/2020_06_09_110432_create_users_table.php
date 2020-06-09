<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('email')->unique();
			$table->timestamp('email_verified_at');
			$table->string('phone');
			$table->timestamp('phone_verified_at');
			$table->string('avatar')->nullable();
			$table->string('first_name');
			$table->string('last_name');
			$table->softDeletes();
			$table->string('password');
			$table->rememberToken('rememberToken');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}