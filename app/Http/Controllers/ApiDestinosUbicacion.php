<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Direccion;
use App\Restaurante;
use App\Hotel;
use App\Spa;
use Response;
use DB;

class ApiDestinosUbicacion extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//

		$a =[];
		$b =[];

		$ubicacion_restaurantes = DB::table('direcciones')
					->join('restaurantes', 'direcciones.restaurante_id', '=', 'restaurantes.id')
					->select('direcciones.latitud', 'direcciones.longitud', 'restaurantes.id', 'restaurantes.nombre', 'restaurantes.categoria_id')
					->whereNull('restaurantes.deleted_at')
					->get();


		$ubicacion_hoteles = DB::table('direcciones')
					->join('hoteles', 'direcciones.hotel_id', '=', 'hoteles.id')
					->select('direcciones.latitud', 'direcciones.longitud', 'hoteles.id', 'hoteles.nombre', 'hoteles.categoria_id')
					->whereNull('deleted_at')
					->get(); 


		$ubicacion_spas = DB::table('direcciones')
					->join('spas', 'direcciones.spa_id', '=', 'spas.id')
					->select('direcciones.latitud', 'direcciones.longitud', 'spas.id', 'spas.nombre', 'spas.categoria_id')
					->whereNull('spas.deleted_at')
					->get(); 

		$a = array_merge($ubicacion_restaurantes,$ubicacion_hoteles);

		$b = array_merge($a, $ubicacion_spas);

		return Response::json($b);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
