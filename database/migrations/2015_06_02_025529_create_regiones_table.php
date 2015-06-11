<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegionesTable extends Migration {

	public function up()
	{
		Schema::create('regiones', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('nombre', 255)->default('NULL');
		});
	}

	public function down()
	{
		Schema::drop('regiones');
	}
}