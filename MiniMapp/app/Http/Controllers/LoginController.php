<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\BaseController;
use Illuminate\Routing\Controller;

class LoginController extends Controller{
	public $restful = true;

	public function login(){
		$userdata = array(
            'login' => Input::get('username'),
            'password'=> Input::get('password')
        );
        // Validamos los datos y además mandamos como un segundo parámetro la opción de recordar el usuario.
        if(Auth::attempt($userdata))
        {
            if(Auth::user()->id_roll != '1'){
                return Redirect::to('/')
                    ->with('mensaje_error', 'Usuario no autorizado.')
                    ->withInput();
            }
            // De ser datos válidos nos mandara a la bienvenida
            //return Auth::user()->login; 
            return Redirect::to('home');
          
        }

        // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
        return Redirect::to('/')
                    ->with('mensaje_error', 'Tus datos son incorrectos')
                    ->withInput();
	}


	public function logout(){
		Auth::logout();
        return Redirect::to('/')
                    ->with('mensaje_error', 'Tu sesión ha sido cerrada.');
	}


}