<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spa extends Model {

	protected $table = 'spas';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function direccion()
	{
		return $this->hasMany('Direccion');
	}

}