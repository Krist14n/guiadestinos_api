<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Region;
use App\Estado;
use App\Ciudad;
use App\Hotel;
use App\Direccion;

use Illuminate\Http\Request;

class HotelesController extends Controller {
	/**
	* Create a new controller instance
	*
	* @return void
	*/
	public function __construct(Estado $estado, Region $region, Ciudad $ciudad, Hotel $hotel, Direccion $direccion)
	{
		$this->middleware('auth');
		$this->estado 		= 	$estado;
		$this->region 		= 	$region;
		$this->ciudad 		= 	$ciudad;
		$this->hotel 		= 	$hotel;
		$this->direccion 	= 	$direccion;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Hotel $hotel, Region $regiones, Estado $estado, Ciudad $ciudad)
	{
		//
		$hoteles = $hotel->get();
		
		return view('hoteles', compact('hoteles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$ciudades = $this->ciudad->get();

		return view('crear_hoteles', compact('ciudades'));
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
		$web 			= 	$request->web;
		$promocion 		= 	$request->promocion;
		$token 			=   $request->_token;
		
		$direccion 		=	$request->direccion;
		$latitud		= 	$request->latitud;
		$longitud		=	$request->longitud;
		$telefono 		=   $request->telefono;


		//Una vez validados los requests
		$hotel = Hotel::create(array(
			'nombre' 		=>	$nombre,
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

		$hotel->direccion()->save($direccion);

		return redirect('hoteles');
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
		$hotel = $this->hotel->whereId($id)->first();

		$direccion = $this->direccion->whereHotel_id($id)->first();

		$ciudades = $this->ciudad->get();
		
		return view('edita_hoteles', compact('hotel','ciudades', 'direccion'));
	
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
		$web 			= 	$request->web;
		$promocion 		= 	$request->promocion;
		$token 			=   $request->_token;
		
		$direccion 		=	$request->direccion;
		$latitud		= 	$request->latitud;
		$longitud		=	$request->longitud;
		$telefono 		=   $request->telefono;


		//Una vez validados los requests
		
		$hotel = Hotel::where('id', '=', $id)->update(array(
			'nombre' 		=>	$nombre,
			'ciudad_id' 	=>	$ciudad_id,
			'categoria_id'	=> 	$categoria_id,
			'descripcion'	=> 	$descripcion,
			'web'			=>	$web,
			'promocion'		=>	$promocion,
			'_token'		=>	$token
		));

		$direccion = Direccion::where('hotel_id','=',$id)->update(array(
			'direccion'		=> 	$direccion,
			'latitud'		=>	$latitud,
			'longitud'		=>	$longitud,
			'telefono'		=> 	$telefono
		));

		return redirect('hoteles');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Hotel $hotel)
	{
		//
		$hoteles = $this->hotel->whereId($id)->first();
		$hoteles->delete();
		return redirect('hoteles');
	}

}
