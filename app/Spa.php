<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spa extends Model {

	protected $table = 'spas';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = 
		[
			'id',
			'ciudad_id',
			'categoria_id',
			'nombre',
			'descripcion',
			'tratamientos',
			'web',
			'promocion',
			'_token'
		];
	public function direccion()
	{
		return $this->hasOne('App\Direccion');
	}

}