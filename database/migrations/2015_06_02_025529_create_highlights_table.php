<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHighlightsTable extends Migration {

	public function up()
	{
		Schema::create('highlights', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('ciudad_id')->unsigned();
			$table->string('zona', 255)->default('NULL');
			$table->string('descripcion', 255)->default('NULL');
		});
	}

	public function down()
	{
		Schema::drop('highlights');
	}
}