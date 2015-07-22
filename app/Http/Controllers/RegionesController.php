<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Region;
use Illuminate\http\Request;

class RegionesController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Region $region)
	{
		$this->middleware('auth');
		$this->region = $region;
	}

	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$regiones = $this->region->get();

		return view('regiones', compact("regiones"));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('crear_regiones');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, Region $region)
	{
		//

		$rules = array(
			'nombre'  => 'required|alpha|unique'
		);

		$validator = Validator::make($request->all(), $rules);

		if($validator->fails())
		{
			$messages = $validator->messages();
			return Redirect::to('regiones/create')->withErrors($validator);

		}else{
			
			$this->region->create($request->all());

			return redirect('regiones');
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
		$region = $this->region->whereId($id)->first();

		return compact('region');
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

		$region = $this->region->whereId($id)->first();

		return view('edita_regiones', compact('region'));

		
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

		$region = $this->region->whereId($id)->first();

		$region->nombre = $request->get('nombre');

		$region->save();

		return redirect('regiones');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Region $region)
	{
		//
		$regiones = $this->region->whereId($id)->first();
		$regiones->delete();
		return redirect('regiones');
	}

}
