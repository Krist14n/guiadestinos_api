<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDireccionesTable extends Migration {

	public function up()
	{
		Schema::create('direcciones', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('direccion', 255)->default('NULL');
			$table->string('telefono', 255)->default('NULL');
			$table->integer('hotel_id')->unsigned();
			$table->integer('restaurant_id')->unsigned();
			$table->integer('spa_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('direcciones');
	}
}