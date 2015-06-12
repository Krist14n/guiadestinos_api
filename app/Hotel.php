<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model {

	protected $table = 'hoteles';
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
		'_token'
	];

	public function direccion()
	{
		return $this->hasOne('App\Direccion');
	}

}