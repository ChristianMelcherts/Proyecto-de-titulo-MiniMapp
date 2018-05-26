<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/////
Route::get('/', function()
{
	return view('login');
});
Route::get('login', function()
{
	return view('login');
});

Route::post('login', array('uses'=>'LoginController@login', 'as'=>'login'));
Route::get('logout', array('uses'=>'LoginController@logout', 'as'=>'logout'));
/////

/////AUT
Route::group(array('middleware' => 'auth'), function(){
	/*
	Route::get('/', function () {
	    return view('templates.default');
	});
	*/
	Route::resource('Home', 'HomeController@Controller');
		Route::get('home/', array('uses' => 'HomeController@index', 'as' => 'home'));

	Route::resource('flag', 'FlagsController');
		Route::get('flags/', array('uses' => 'FlagsController@index', 'as' => 'flags'));
	//Route::get('/', array('uses' => 'HomeController@index', 'as' => 'home'));


	Route::resource('usuario', 'UsuariosController');
		Route::get('usuarios/', array('uses' => 'UsuariosController@index', 'as' => 'usuarios'));
		Route::get('localizacion', array('uses' => 'UsuariosController@localizacion', 'as' => 'localizacion'));
		Route::get('coordenadas/{id_usuarios}', 'UsuariosController@coordenadas');

	Route::resource('beneficio', 'BeneficiosController');
		Route::get('beneficios/', array('uses' => 'BeneficiosController@index', 'as' => 'beneficios'));

	Route::resource('mapa', 'MapaController');
		Route::get('mapas/', array('uses' => 'MapaController@index', 'as' => 'mapas'));


});
///Agregar prefijo api/ antes de las rutas





