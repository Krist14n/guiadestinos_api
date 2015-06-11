<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpasTable extends Migration {

	public function up()
	{
		Schema::create('spas', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('categoria_id')->unsigned();
			$table->string('nombre', 255)->default('NULL');
			$table->string('tratamientos', 255)->default('NULL');
			$table->string('web', 255)->default('NULL');
		});
	}

	public function down()
	{
		Schema::drop('spas');
	}
}