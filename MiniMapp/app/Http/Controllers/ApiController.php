<?php

namespace App\Http\Controllers;


use App\Flags;
use App\Acceso;
use App\Http\Requests;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Usuarios;
use App\Localizacion;
use Illuminate\Support\Facades\Validator;


class ApiController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $params = [];
      $view = view('app.index', $params);
      
      $json = json_decode($view);
      return response()->json($json);
    }

    public function registration()
    {  
      $view = view('app.signup');
      //return $view;
      $json = json_decode($view);
      return response()->json($json);
    }

    public function apitest()
    {
        return "Api Funcional";
    }

    public function getflag()
    {
        $response = DB::select('SELECT * FROM flags');
        //return $response;
        return json_encode($response);

    }
    public function postflag()
    {
        $id_flag = Input::get('id_flags');

        if(!$id_flag){
            die("ID Requerido");
        }else{
            $query = 'SELECT * FROM flags WHERE id_flags = '. $id_flags;
            $response = DB::select($query);
            //return $response;
            if(!$response) die("Flag not Found");
            return json_encode($response);
        }
    }

    public function getlocalizacion()
    {
        $response = DB::select('SELECT * FROM localizacion');
        //return $response;
        return json_encode($response);

    }






    public function signup(Request $request)
    {
        $credentials = $request->only('name','username','mail','password','password2');



        $rules = array(
            'name'    => 'required',
            'username'     => 'required|unique:usuarios,login',
            'mail'    => 'required|email|unique:usuarios,correo',
            'password' => 'required|min:3|same:password2',
            'password2' => 'required|min:3|same:password'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()){
            return $this->response->errorUnauthorized()->withErrors($validator)->withInput();
            //return Redirect::back()->withErrors($validator)->withInput();
        }

        $response = DB::select('SELECT max(id_usuarios)+1 as response FROM usuarios');
        $id_usuarios = $response[0]->response;
  

        $usuarios = new Usuarios();
        $usuarios->id_usuarios       = $id_usuarios;
        $usuarios->nombre         = Input::get('name');
        $usuarios->correo         = Input::get('mail');
        $usuarios->password      = Hash::make(Input::get('password'));
        $usuarios->login         = Input::get('username');
        $usuarios->activo      = '1';
        $usuarios->id_roll    = '2';
    
        $usuarios->save();
       
        return json_encode(compact('usuarios'));
        //return Redirect::to('usuarios')->with('flash_message', 'Usuario creado exitosamente');
    }








 /////////APIS/////////////////////////

    
















    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}