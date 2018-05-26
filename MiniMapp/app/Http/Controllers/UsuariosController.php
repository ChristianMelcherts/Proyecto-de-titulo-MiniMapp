<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use App\Localizacion;
use App\Roll;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuarios = Usuarios::all();
        return view('usuarios.index', array('usuarios'=>$usuarios));
    }

   
    public function create()
    {
        $Roll = Roll::all();
        return view('usuarios.create', array('Roll'=>$Roll));
    }


    public function show($id_usuarios)
    {
        $usuarios      = Usuarios::find($id_usuarios);
        $localizacion = Localizacion::where('id_usuarios', $id_usuarios)->first();

        return view('usuarios.show', array('usuarios'=>$usuarios, 'localizacion'=>$localizacion));
    }

    public function edit($id_usuario)
    {
        $usuario      = Usuarios::find($id_usuario);
        $Roll         = Roll::all();
        $el_Roll      = Roll::find($usuario->id_roll);
        return view('usuarios.edit', array('usuario'=>$usuario, 'Roll'=>$Roll, 'el_Roll'=>$el_Roll));
    }

 


    
    public function store()
    {
        /*
        unique:flags,flag
        */
        $rules = array(
            'nombre'    => 'required',
            'login'     => 'required|unique:usuarios,login',
            'correo'    => 'required|email|unique:usuarios,correo',
            'password1' => 'required|min:3|same:password2',
            'password2' => 'required|min:3|same:password1',
            'id_roll'   => 'required|numeric',
            'activo'    => 'required');
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $response = DB::select('SELECT max(id_usuarios)+1 as response FROM usuarios');
        $id_usuarios = $response[0]->response;
  

        $usuarios = new Usuarios();
        $usuarios->id_usuarios       = $id_usuarios;
        $usuarios->nombre         = Input::get('nombre');
        $usuarios->correo         = Input::get('correo');
        $usuarios->password      = Hash::make(Input::get('password1'));
        $usuarios->login         = Input::get('login');
        $usuarios->activo      = Input::get('activo');
        $usuarios->id_roll    = Input::get('id_roll');
    
        $usuarios->save();
       

        return Redirect::to('usuarios')->with('flash_message', 'Usuario creado exitosamente');
    }




    public function localizacion()
    {
     
        $query = "SELECT * FROM localizacion";
        
        $localizacion = DB::select($query);
        
        return Response::json($localizacion);
    }

   
    
  
    public function update($id_usuario)
    {
        $usuarios = Usuarios::find($id_usuario);
        //////
        $rules = array(
            'nombre'    => 'required',
            'login'     => 'required|unique:usuarios,login',
            'correo'    => 'required|email|unique:usuarios,correo',
            'password1' => 'required|min:3|same:password2',
            'password2' => 'required|min:3|same:password1',
            'id_roll'   => 'required|numeric',
            'activo'    => 'required');

        if(Input::get('password1') == "" and Input::get('password2') == ""){
            $rules['password1'] = ''; 
            $rules['password2'] = ''; 
        }else{
            $usuarios->password         = Hash::make(Input::get('password1'));
        }

        if(Input::get('login') == $usuarios->login){
            $rules['login'] = 'required'; 
        }
        if(Input::get('correo') == $usuarios->correo){
            $rules['correo'] = 'required|email'; 
        }

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
       

        ///////
        $usuarios->nombre           = Input::get('nombre');
        $usuarios->correo           = Input::get('correo');
        $usuarios->login            = Input::get('login');
        $usuarios->activo           = Input::get('activo');
        $usuarios->id_roll          = Input::get('id_roll');
        $usuarios->save();
        
        
        return Redirect::route('usuarios')->with('flash_message', 'Usuario editado exitosamente');
    }


    public function destroy($id_usuario)
    {
        $usuario = Usuarios::find($id_usuario);
        $usuario->delete();
        Session::flash('flash_message', 'Usuario eliminado exitosamente');
        return Response::json('Usuario eliminado exitosamente');
    }




}
