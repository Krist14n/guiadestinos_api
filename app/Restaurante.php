<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurante extends Model {

	protected $table = 'restaurantes';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function direccion()
	{
		return $this->hasMany('Direccion');
	}

}