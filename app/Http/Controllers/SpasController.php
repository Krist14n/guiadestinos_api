<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Region;
use App\Estado;
use App\Ciudad;
use App\Spa;
use App\Direccion;
use Illuminate\Http\Request;

class SpasController extends Controller {
	/**
	* Create a new controller instance
	*
	* @return void
	*/
	public function __construct(Estado $estado, Region $region, Ciudad $ciudad, Spa $spa, Direccion $direccion)
	{
		$this->middleware('auth');
		$this->estado 		= 	$estado;
		$this->region 		= 	$region;
		$this->ciudad 		= 	$ciudad;
		$this->spa 			= 	$spa;
		$this->direccion 	= 	$direccion;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Spa $spa)
	{
		//
		$spas = $spa->get();

		return view('spas', compact('spas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Ciudad $ciudad)
	{
		//
		$ciudades = $ciudad->get();

		return view('crear_spas', compact('ciudades'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{	

		//Validar estos Requests
		$nombre 		=	$request->nombre;
		$ciudad_id 		= 	$request->ciudad_id;
		$categoria_id 	= 	$request->categoria_id;
		$descripcion 	= 	$request->descripcion;
		$tratamientos   =  	$request->tratamientos;
		$web 			= 	$request->web;
		$promocion 		= 	$request->promocion;
		$token 			=   $request->_token;

		$direccion 		=	$request->direccion;
		$latitud		= 	$request->latitud;
		$longitud		=	$request->longitud;
		$telefono 		=   $request->telefono;

		//Una vez validados los requests
		$spa = Spa::create(array(
			'nombre' 			=>	$nombre,
			'tratamientos'		=> 	$tratamientos,
			'ciudad_id' 		=>	$ciudad_id,
			'categoria_id'		=> 	$categoria_id,
			'descripcion'		=> 	$descripcion,
			'web'				=>	$web,
			'promocion'			=>	$promocion,
			'_token'			=>	$token
		));

		$direccion = Direccion::create(array(
			'direccion'		=> 	$direccion,
			'latitud'		=>	$latitud,
			'longitud'		=>	$longitud,
			'telefono'		=> 	$telefono
		));

		$spa->direccion()->save($direccion);

		return redirect('spas');

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
		$spa = $this->spa->whereId($id)->first();

		$direccion = $this->direccion->whereSpa_id($id)->first();

		$ciudades = $this->ciudad->get();

		return view('edita_spas', compact('spa','ciudades', 'direccion'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		//Validar estos Requests
		$nombre 		=	$request->nombre;
		$ciudad_id 		= 	$request->ciudad_id;
		$categoria_id 	= 	$request->categoria_id;
		$descripcion 	= 	$request->descripcion;
		$tratamientos   =  	$request->tratamientos;
		$web 			= 	$request->web;
		$promocion 		= 	$request->promocion;
		$token 			=   $request->_token;

		$direccion 		=	$request->direccion;
		$latitud		= 	$request->latitud;
		$longitud		=	$request->longitud;
		$telefono 		=   $request->telefono;

		//Una vez validados los requests
		$spa = Spa::where('id', '=', $id)->update(array(
			'nombre' 			=>	$nombre,
			'tratamientos'		=> 	$tratamientos,
			'ciudad_id' 		=>	$ciudad_id,
			'categoria_id'		=> 	$categoria_id,
			'descripcion'		=> 	$descripcion,
			'web'				=>	$web,
			'promocion'			=>	$promocion,
			'_token'			=>	$token
		));

		$direccion = Direccion::where('spa_id','=', $id)->update(array(
			'direccion'		=> 	$direccion,
			'latitud'		=>	$latitud,
			'longitud'		=>	$longitud,
			'telefono'		=> 	$telefono
		));

		return redirect('spas');
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
