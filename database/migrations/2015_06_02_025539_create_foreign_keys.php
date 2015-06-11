<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('estados', function(Blueprint $table) {
			$table->foreign('region_id')->references('id')->on('regiones')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('ciudades', function(Blueprint $table) {
			$table->foreign('estado_id')->references('id')->on('estados')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('highlights', function(Blueprint $table) {
			$table->foreign('ciudad_id')->references('id')->on('ciudades')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('hoteles', function(Blueprint $table) {
			$table->foreign('categoria_id')->references('id')->on('categorias')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('restaurantes', function(Blueprint $table) {
			$table->foreign('categoria_id')->references('id')->on('categorias')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('spas', function(Blueprint $table) {
			$table->foreign('categoria_id')->references('id')->on('categorias')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('direcciones', function(Blueprint $table) {
			$table->foreign('hotel_id')->references('id')->on('hoteles')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('direcciones', function(Blueprint $table) {
			$table->foreign('restaurant_id')->references('id')->on('restaurantes')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('direcciones', function(Blueprint $table) {
			$table->foreign('spa_id')->references('id')->on('spas')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('estados', function(Blueprint $table) {
			$table->dropForeign('estados_region_id_foreign');
		});
		Schema::table('ciudades', function(Blueprint $table) {
			$table->dropForeign('ciudades_estado_id_foreign');
		});
		Schema::table('highlights', function(Blueprint $table) {
			$table->dropForeign('highlights_ciudad_id_foreign');
		});
		Schema::table('hoteles', function(Blueprint $table) {
			$table->dropForeign('hoteles_categoria_id_foreign');
		});
		Schema::table('restaurantes', function(Blueprint $table) {
			$table->dropForeign('restaurantes_categoria_id_foreign');
		});
		Schema::table('spas', function(Blueprint $table) {
			$table->dropForeign('spas_categoria_id_foreign');
		});
		Schema::table('direcciones', function(Blueprint $table) {
			$table->dropForeign('direcciones_hotel_id_foreign');
		});
		Schema::table('direcciones', function(Blueprint $table) {
			$table->dropForeign('direcciones_restaurant_id_foreign');
		});
		Schema::table('direcciones', function(Blueprint $table) {
			$table->dropForeign('direcciones_spa_id_foreign');
		});
	}
}