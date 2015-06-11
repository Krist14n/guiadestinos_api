<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model {

	protected $table = 'categorias';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function hoteles()
	{
		return $this->hasMany('Hotel');
	}

	public function restaurantes()
	{
		return $this->hasMany('Restaurante');
	}

	public function spas()
	{
		return $this->hasMany('Spa');
	}

}