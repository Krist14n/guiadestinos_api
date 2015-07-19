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


//Rutas Admin

Route::resource("regiones", "RegionesController");

Route::resource("estados", "EstadosController");

Route::resource("ciudades", "CiudadesController");

Route::resource("hoteles", "HotelesController");

Route::resource("restaurantes", "RestaurantesController");

Route::resource("spas", "SpasController");

Route::resource("highlights", "HighlightsController");


//Rutas API

Route::resource("api_regiones", "ApiRegionesController");
 
Route::resource("api_estados", "ApiEstadosController");

Route::resource("api_restaurantes_ciudades", "ApiRestaurantesCiudadesController");

Route::resource("api_restaurante_ciudad", "ApiRestauranteCiudadController");

Route::resource("api_hoteles_ciudades", "ApiHotelesCiudadesController");

Route::resource("api_hotel_ciudad", "ApiHotelCiudadController");

Route::resource("api_spas_ciudades", "ApiSpasCiudadesController");

Route::resource("api_spa_ciudad", "ApiSpaCiudadController");

Route::resource("api_highlights_estados", "ApiHighlightEstados");

Route::resource("api_highlights_ciudades", "ApiHighlightCiudades");

Route::resource("api_highlight_ciudad", "ApiHighlightCiudad");

Route::resource("api_destinos_ubicacion", "ApiDestinosUbicacion");

Route::resource("api_destinos_ciudades_descuentos", "ApiCiudadesDescuentos");

Route::resource("api_restaurantes_descuentos", "ApiRestaurantesDescuentos");




