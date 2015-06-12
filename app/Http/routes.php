<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



/*Route::bind("regiones", function($id)
{
	return App\Region::where('id', $id)->first();

});*/


Route::resource("regiones", "RegionesController");

Route::resource("estados", "EstadosController");

Route::resource("ciudades", "CiudadesController");

Route::group([ 'before' => 'csrf' ], function(){
	Route::resource("hoteles", "HotelesController");
});

