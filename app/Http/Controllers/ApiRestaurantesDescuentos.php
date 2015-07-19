<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Restaurante;
use App\Ciudad;
use DB;
use Response;

class ApiRestaurantesDescuentos extends Controller {

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
	public function show($id)
	{
		//
		$restaurantes_descuentos = DB::table('restaurantes')
								->join('ciudades', 'ciudades.id', '=', 'restaurantes.ciudad_id')
								->where('ciudades.id', '=', $id)
								->where('restaurantes.promocion', '!=', '')
								->whereNull('restaurantes.deleted_at')
								->select('restaurantes.id','restaurantes.nombre')
								->distinct()
								->get();

		return Response::json($restaurantes_descuentos);
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
