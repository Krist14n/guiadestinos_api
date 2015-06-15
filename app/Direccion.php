<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Direccion extends Model {

	protected $table = 'direcciones';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = 
		[
			'direccion',
			'telefono',
			'hotel_id',
			'restaurant_id',
			'spa_id',
			'latitud',
			'longitud'
		];
	public function hotel()

	{
		return $this->belongsTo('Hotel');
	}

	public function restaurant()
	{
		return $this->belongsTo('Restaurant');
	}

	public function spa()
	{
		return $this->belongsTo('Spa');
	}

	public function highlight()
	{
		return $this->belongsTo('Highlight');
	}

}