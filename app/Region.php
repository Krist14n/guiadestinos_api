<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model {

	protected $table = 'regiones';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = [
		'nombre'
	];


	public function estados()
	{
		return $this->hasMany('Estado');
	}

}