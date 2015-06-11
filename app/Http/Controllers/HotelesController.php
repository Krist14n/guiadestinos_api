<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Region;
use App\Estado;
use App\Ciudad;
use App\Hotel;
use Illuminate\Http\Request;

class HotelesController extends Controller {
	/**
	* Create a new controller instance
	*
	* @return void
	*/
	public function __construct(Estado $estado, Region $region, Ciudad $ciudad, Hotel $hotel)
	{
		$this->middleware('auth');
		$this->estado 	= 	$estado;
		$this->region 	= 	$region;
		$this->ciudad 	= 	$ciudad;
		$this->hotel 	= 	$hotel;

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Hotel $hotel)
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
