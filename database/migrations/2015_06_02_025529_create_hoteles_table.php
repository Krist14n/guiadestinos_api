<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHotelesTable extends Migration {

	public function up()
	{
		Schema::create('hoteles', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('categoria_id')->unsigned();
			$table->string('nombre', 255)->default('NULL');
			$table->string('descripcion', 255)->default('NULL');
			$table->string('promocion', 255)->default('NULL');
			$table->string('web', 255)->default('NULL');
		});
	}

	public function down()
	{
		Schema::drop('hoteles');
	}
}