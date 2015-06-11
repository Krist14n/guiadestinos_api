<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestaurantesTable extends Migration {

	public function up()
	{
		Schema::create('restaurantes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('categoria_id')->unsigned();
			$table->string('nombre', 255)->default('NULL');
			$table->string('tipo_comida', 255)->default('NULL');
			$table->string('descripcion', 255)->default('NULL');
			$table->string('recomendacion_mb', 255)->default('NULL');
			$table->string('promocion', 255)->default('NULL');
			$table->string('web', 255)->default('NULL');
		});
	}

	public function down()
	{
		Schema::drop('restaurantes');
	}
}