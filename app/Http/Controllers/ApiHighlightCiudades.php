<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Highlight;
use App\Estado;
use App\Ciudad;
use Response;
use DB;

class ApiHighlightCiudades extends Controller {

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
		$ciudades = DB::table('ciudades')
					->join('highlights', 'highlights.ciudad_id', '=', 'ciudades.id')
					->join('highlights', 'highlights.estado_id', '=', 'estados.id')
					->select('ciudades.nombre', 'ciudades.id')
					->where('highlights.estados_id', '=', $id)
					->groupby('ciudades.nombre')
					->distinct()
					->get();

		return Response::json($ciudades);

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
