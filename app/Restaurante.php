<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurante extends Model {

	protected $table = 'restaurantes';
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
			'web',
			'promocion',
			'_token',
			'recomendacion_mb',
			'tipo_comida'
		];
	public function direccion()
	{
		return $this->hasOne('App\Direccion');
	}

}