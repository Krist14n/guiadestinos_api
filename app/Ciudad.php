<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciudad extends Model {

	protected $table = 'ciudades';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = [
		'nombre', 'estado_id'
	];

	public function highlights()
	{
		return $this->hasMany('Highlight');
		
	}

}