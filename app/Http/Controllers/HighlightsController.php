<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Region;
use App\Estado;
use App\Ciudad;
use App\Highlight;
use App\Direccion;
use Illuminate\Http\Request;

class HighlightsController extends Controller {
	/**
	* Create a new controller instance
	*
	* @return void
	*/
	public function __construct(Estado $estado, Region $region, Ciudad $ciudad, Direccion $direccion, Highlight $highlight)
	{
		$this->middleware('auth');
		$this->estado 		= 	$estado;
		$this->region 		= 	$region;
		$this->ciudad 		= 	$ciudad;
		$this->direccion 	= 	$direccion;
		$this->highlight 	=  	$highlight;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Highlight $highlight)
	{
		//
		$highlights = $highlight->get();

		return view("highlights", compact('highlights'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Estado $estado, Ciudad $ciudad)
	{
		//
		$estados = $estado->get();

		$ciudades = $ciudad->get();

		return view("crear_highlights", compact('estados', 'ciudades'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$ruta_imagen = "";
		$nombre_imagen = "";

		$nombre 		= $request->nombre;
		$estado_id 		= $request->estado_id;
		$ciudad_id 		= $request->ciudad_id;
		$categoria_id 	= $request->categoria_id;
		$highlights 	= $request->highlights;
		$descripcion 	= $request->descripcion;


		if ($request->file('foto')) {
			
			$imagen 		=	$request->file('foto');
			$ruta_imagen 	=	storage_path().'/images/';
			$nombre_imagen  =   str_random(6).'_'.$imagen->getClientOriginalName();
			$uploadSuccess 	=   $imagen->move($ruta_imagen, $nombre_imagen);

		}

		$highlight = Highlight::create(array(
			'ciudad_id' 		=> $ciudad_id,
			'estado_id' 		=> $estado_id,
			'nombre' 			=> $nombre,
			'descripcion' 		=> $descripcion,
			'lista_highlights' 	=> $highlights,
			'foto' 				=> $ruta_imagen.$nombre_imagen
		));


		if($highlight->save())
		{
			return redirect('highlights');
		}

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

		$highlight = $this->highlight->whereId($id)->first();

		$estados = $this->estado->get();

		$ciudades = $this->ciudad->get();


		return view('edita_highlights', compact('highlight','estados', 'ciudades'));

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
		$ruta_imagen = "";
		$nombre_imagen = "";

		$nombre 		= $request->nombre;
		$estado_id 		= $request->estado_id;
		$ciudad_id 		= $request->ciudad_id;
		$categoria_id 	= $request->categoria_id;
		$highlights 	= $request->highlights;
		$descripcion 	= $request->descripcion;
		$token 			= $request->_token;


		if ($request->file('foto')) {
			
			$imagen 		=	$request->file('foto');
			$ruta_imagen 	=	storage_path().'/images/';
			$nombre_imagen  =   str_random(6).'_'.$imagen->getClientOriginalName();
			$uploadSuccess 	=   $imagen->move($ruta_imagen, $nombre_imagen);


			$highlight = Highlight::where('id', '=', $id)->update(array(
				'ciudad_id' 		=> $ciudad_id,
				'estado_id' 		=> $estado_id,
				'nombre' 			=> $nombre,
				'descripcion' 		=> $descripcion,
				'lista_highlights' 	=> $highlights,
				'foto' 				=> $ruta_imagen.$nombre_imagen,
				'token'				=> $token
			));

		}else{	

			$highlight = Highlight::where('id', '=', $id)->update(array(

				'ciudad_id' 		=> $ciudad_id,
				'estado_id' 		=> $estado_id,
				'nombre' 			=> $nombre,
				'descripcion' 		=> $descripcion,
				'lista_highlights' 	=> $highlights,
				'token'				=> $token
			));
		}


			return redirect('highlights');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Highlight $highlight)
	{
		//
		$highlights = $this->highlight->whereId($id)->first();
		$highlights->delete();
		return redirect('highlights');

	}

}
