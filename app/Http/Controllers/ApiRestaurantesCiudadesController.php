<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Response;
use App\Region;
use App\Estado;
use App\Ciudad;
use App\Restaurante;

class ApiRestaurantesCiudadesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function show($id, Ciudad $ciudad, Restaurante $restaurante)
	{
		//
		$restaurantes = DB::table('restaurantes')
					->join('ciudades', 'restaurantes.ciudad_id', '=', 'ciudades.id')
					->where('restaurantes.ciudad_id', '=', $id)
					->where('categoria_id', '=', '2')
					->get(array('restaurantes.*', 'ciudades.nombre as nombre_ciudad'));

		return Response::json($restaurantes);

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
