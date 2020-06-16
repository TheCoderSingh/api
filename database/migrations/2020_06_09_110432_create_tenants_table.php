<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTenantsTable extends Migration {

	public function up()
	{
		Schema::create('tenants', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
            $table->string('domain')->unique();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('tenants');
	}
}
