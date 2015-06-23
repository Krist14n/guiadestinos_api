<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Estado;
use App\Region;
use Illuminate\http\Request;

class EstadosController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Estado $estado, Region $region)
	{
		$this->middleware('auth');
		$this->estado = $estado;
		$this->region = $region;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Estado $estado)
	{
		//
		$estados = $estado->get();
		return view('estados',compact("estados"));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$regiones = $this->region->get();

		return view('crear_estados', compact('regiones'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//

		$this->estado->create($request->all());

		return redirect('estados');

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
		$estado = $this->estado->whereId($id)->first();

		return compact('estado');
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

		$estado = $this->estado->whereId($id)->first();

		return view('edita_estados', compact('estado'));
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

		$estado = $this->estado->whereId($id)->first();

		$estado->nombre = $request->get('nombre');

		$estado->save();

		return redirect('estados');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Estado $estado)
	{
		//
		$estados = $this->estado->whereId($id)->first();
		$estados->delete();
		return redirect('estados');
	}

}
