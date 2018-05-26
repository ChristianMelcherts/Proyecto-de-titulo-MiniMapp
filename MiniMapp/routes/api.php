<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1',function($api) {


	$api->get('getlocalizacion/{login}','App\Http\Controllers\ApiMapController@getLocalization');

	// Api que genera las token JWT
	$api->post('token','App\Http\Controllers\Auth\AuthController@getTokens');
	$api->get('apitest','App\Http\Controllers\ApiController@apitest');

	$api->get('localizacion','App\Http\Controllers\ApiController@getlocalizacion');

	$api->get('flag','App\Http\Controllers\ApiController@getflag');
	$api->post('flag','App\Http\Controllers\ApiController@postflag');

	$api->get('MiniMappIndex','App\Http\Controllers\ApiController@index');
	$api->get('MiniMappMap/{coord}/{login}','App\Http\Controllers\ApiMapController@index');

	$api->get('MiniMappFlag/{login}','App\Http\Controllers\ApiFlagController@index');
	$api->post('MiniMappUserFlag','App\Http\Controllers\ApiFlagController@alterFlag');

	$api->get('MiniMappUser/{login}','App\Http\Controllers\ApiUserController@index');

	//$api->get('MiniMappUser','App\Http\Controllers\ApiUserController@index');


	$api->get('MiniMappRegistration','App\Http\Controllers\ApiController@registration');
	$api->post('signup','App\Http\Controllers\ApiController@signup');

	
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$api->version('v1', ['middleware' => 'api.auth'], function($api){
///api de administracion



});

