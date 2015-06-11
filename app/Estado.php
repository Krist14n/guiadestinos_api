<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model {

	protected $table = 'estados';
	public $timestamps = true;

	use SoftDeletes;

	protected $fillable = [
		'nombre', 'region_id'
	];

	protected $dates = ['deleted_at'];

	public function ciudades()
	{
		return $this->hasMany('Ciudad');
	}

}