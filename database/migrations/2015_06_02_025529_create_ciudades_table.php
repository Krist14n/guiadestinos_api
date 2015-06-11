<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCiudadesTable extends Migration {

	public function up()
	{
		Schema::create('ciudades', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('estado_id')->unsigned();
			$table->string('nombre', 255)->default('NULL');
			$table->string('foto', 255)->default('NULL');
		});
	}

	public function down()
	{
		Schema::drop('ciudades');
	}
}