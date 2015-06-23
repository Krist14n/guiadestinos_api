<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Region;
use App\Estado;
use App\Ciudad;
use App\Restaurante;
use App\Direccion;
use Illuminate\Http\Request;

class RestaurantesController extends Controller {
	/**
	* Create a new controller instance
	*
	* @return void
	*/
	public function __construct(Estado $estado, Region $region, Ciudad $ciudad, Restaurante $restaurante, Direccion $direccion)
	{
		$this->middleware('auth');
		$this->estado 		= 	$estado;
		$this->region 		= 	$region;
		$this->ciudad 		= 	$ciudad;
		$this->restaurante 	= 	$restaurante;
		$this->direccion 	= 	$direccion;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Restaurante $restaurante)
	{
		//
		$restaurantes = $restaurante->get();
		

		return view('restaurantes', compact('restaurantes'));
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

		return view('crear_restaurantes', compact('ciudades'));
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
		$recomendacion  =   $request->recomendacion;
		$tipo_comida    =   $request->tipo_comida;
		$web 			= 	$request->web;
		$promocion 		= 	$request->promocion;
		$token 			=   $request->_token;

		$direccion 		=	$request->direccion;
		$latitud		= 	$request->latitud;
		$longitud		=	$request->longitud;
		$telefono 		=   $request->telefono;


		//Una vez validados los requests
		$restaurante = Restaurante::create(array(
			'nombre' 		=>	$nombre,
			'tipo_comida'	=> 	$tipo_comida,
			'recomendacion_mb'	=> 	$recomendacion,
			'ciudad_id' 	=>	$ciudad_id,
			'categoria_id'	=> 	$categoria_id,
			'descripcion'	=> 	$descripcion,
			'web'			=>	$web,
			'promocion'		=>	$promocion,
			'_token'		=>	$token
		));

		$direccion = Direccion::create(array(
			'direccion'		=> 	$direccion,
			'latitud'		=>	$latitud,
			'longitud'		=>	$longitud,
			'telefono'		=> 	$telefono
		));

		$restaurante->direccion()->save($direccion);

		return redirect('restaurantes');
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
		$restaurante = $this->restaurante->whereId($id)->first();

		$direccion = $this->direccion->whereRestaurante_id($id)->first();

		$ciudades = $this->ciudad->get();
		
		return view('edita_restaurantes', compact('restaurante','ciudades', 'direccion'));
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
		$recomendacion  =   $request->recomendacion;
		$tipo_comida    =   $request->tipo_comida;
		$web 			= 	$request->web;
		$promocion 		= 	$request->promocion;
		$token 			=   $request->_token;

		$direccion 		=	$request->direccion;
		$latitud		= 	$request->latitud;
		$longitud		=	$request->longitud;
		$telefono 		=   $request->telefono;

		//Una vez validados los requests
		$restaurante = Restaurante::where('id', '=', $id)->update(array(
			'nombre' 		=>	$nombre,
			'tipo_comida'	=> 	$tipo_comida,
			'recomendacion_mb'	=> 	$recomendacion,
			'ciudad_id' 	=>	$ciudad_id,
			'categoria_id'	=> 	$categoria_id,
			'descripcion'	=> 	$descripcion,
			'web'			=>	$web,
			'promocion'		=>	$promocion,
			'_token'		=>	$token
		));

		$direccion = Direccion::where('restaurante_id', '=', $id)->update(array(
			'direccion'		=> 	$direccion,
			'latitud'		=>	$latitud,
			'longitud'		=>	$longitud,
			'telefono'		=> 	$telefono
		));

		return redirect('restaurantes');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Restaurante $restaurante)
	{
		//
		
		$restaurantes = $this->restaurante->whereId($id)->first();
		$restaurantes->delete();
		return redirect('restaurantes');
	}

}
