<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Direccion extends Model {

	protected $table = 'direcciones';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

}