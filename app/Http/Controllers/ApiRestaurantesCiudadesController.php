<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Response;
use App\Region;
use App\Estado;
use App\Ciudad;
use App\Restaurante;
use DB;

class ApiRestaurantesCiudadesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$ciuades = DB::table('restaurantes')
					->join('ciudades', 'ciudades.id', '=', 'restaurantes.ciudad_id')
					->whereNull('restaurantes.deleted_at')
					->groupBy('ciudades.id')
					->get();

		return Response::json($ciuades);
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
		return Response::json($restaurante->where('ciudad_id','=', $id)->where('categoria_id', '=', '2')->get());

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
