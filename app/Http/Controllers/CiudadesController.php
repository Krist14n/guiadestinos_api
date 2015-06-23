<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ciudad;
use App\Region;
use App\Estado;
use Illuminate\http\Request;

class CiudadesController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Ciudad $ciudad, Region $region, Estado $estado)
	{
		$this->middleware('auth');
		$this->ciudad = $ciudad;
		$this->region = $region;
		$this->estado = $estado;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Ciudad $ciudad)
	{
		//
		$ciudades = $ciudad->get();
		return view('ciudades',compact("ciudades"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		//$regiones = $this->region->get();
		$estados = $this->estado->get();

		return view('crear_ciudades', compact('regiones','estados'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$this->ciudad->create($request->all());

		return redirect('ciudades');

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
		$ciudad = $this->ciudad->whereId($id)->first();

		return compact('ciudad');
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
		$ciudad = $this->ciudad->whereId($id)->first();

		return view('edita_ciudades', compact('ciudad'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		//
		$ciudad = $this->ciudad->whereId($id)->first();

		$ciudad->nombre = $request->get('nombre');

		$ciudad->save();

		return redirect('ciudades');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Ciudad $ciudad)
	{
		//
		$ciudades = $this->ciudad->whereId($id)->first();
		$ciudades->delete();
		return redirect('ciudades');
	}

}
