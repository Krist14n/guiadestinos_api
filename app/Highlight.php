<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Highlight extends Model {

	protected $table = 'highlights';
	public $timestamps = true;

	use SoftDeletes;

	protected $fillable = 
	[
		'id',
		'ciudad_id',
		'estado_id',
		'nombre',
		'descripcion',
		'lista_highlights',
		'foto',
		'token'
	];

	protected $dates = ['deleted_at'];

}