<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstadosTable extends Migration {

	public function up()
	{
		Schema::create('estados', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('region_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('estados');
	}
}