<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDireccionesTable extends Migration {

	public function up()
	{
		Schema::create('direcciones', function(Blueprint $table) {
			$table->increments('id');
			$table->string('direccion', 255)->default('NULL');
			$table->string('telefono', 255)->default('NULL');
			$table->string('latitud',255)->default('NULL');
			$table->string('longitud',255)->default('NULL');
			$table->integer('hotel_id')->unsigned()->nullable();
			$table->integer('restaurant_id')->unsigned()->nullable();
			$table->integer('spa_id')->unsigned()->nullable();
			$table->integer('highlight_id')->unsigned()->nullable();

			$table->foreign('hotel_id')->references('id')->on('hoteles');
			$table->foreign('restaurant_id')->references('id')->on('restaurantes');
			$table->foreign('spa_id')->references('id')->on('spas');
			$table->foreign('highlight_id')->references('id')->on('highlights');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('direcciones');
	}
}