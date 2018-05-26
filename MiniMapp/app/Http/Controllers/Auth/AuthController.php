<?php


namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

use App\Usuarios;
use App\Acceso;
use App\Http\Requests;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;



 
class AuthController extends BaseController
{
    
    




    public function getTokens(Request $request){
 
        $credentials = $request->only('login','password');
        



        /////
       
        
        try {
            if(! $token = JWTAuth::attempt($credentials)) {
                return $this->response->errorUnauthorized();
            }

        } catch (JWTException $ex){
            return $this->response->errorInternal();
        }
       
        return json_encode(compact('token'));


    } 



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'nm_nombre' => $data['nm_nombre'],
            'gl_email' => $data['gl_email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    //all the users

    public function index() {
        
        return User::all();
    }


    /////////////////////////////////////////////////////////////////
    ////crearusuario nuevo///////////////////////////////////////////
    /////////////////////////////////////////////////////////////////
    public function userCreate() {

        $nm_login = Input::get('nm_login');
        $nm_tp_usuario = Input::get('nm_tp_usuario');
        $gl_email = Input::get('gl_email');
        $ps_password = Input::get('ps_password');
        $cd_tp_usuario = '1';
        
        if(!$nm_login or !$nm_tp_usuario or !$gl_email or !$ps_password or !$cd_tp_usuario){
            die("Parametros de entrada incorrectos");
        }else{
            //////////////////////////////
            //Valido que nombre no se repita
            $nombre = User::where('nm_login', $nm_login)->first();
            if($nombre){
                return $this->response->errorBadRequest("Nombre ya existe");
       
            }else{
                $nombre = $nm_login;
            } 

            //Valido que que email no este en uso o no se repita
            $email = User::where('gl_email', $gl_email)->first();
            if($email){

                return $this->response->errorBadRequest("Email ya existe");
            }else{
                $email = $gl_email;
            } 

            ///////////////
            //crea la entrada
            $Usuario = new User();
            $id_usuario = DB::select('exec spa_givr_max_registro_abandono');
            $usuario->id_usuario        = $id_usuario[0]->response;
            $Usuario->nm_login          = $nombre;
            $Usuario->nm_tp_usuario     = $nm_tp_usuario;
            $Usuario->gl_email          = $email;
            $Usuario->cd_tp_usuario     = $cd_tp_usuario;
            $Usuario->ps_password       = Hash::make($ps_password);
 
            
            if($Usuario->save()){

                return $this->response->array(compact('Usuario'))->setStatusCode(200);
                //return "usuario creado";
            }else{
                return $this->response->errorInternal("Something went wrong");
            }
        }



  

    }


    ///metodo que identifia al usuario por medio del token
    public function show() {
        try{
            $user = JWTAuth::ParseToken()->toUser();

            if(! $user){
                return $this->response->errorNotFound("User not found");
            }
        }catch (\Tymon\JWTAuth\Exceptions\JWTException $ex){
             return $this->response->error("Something went wrong");
        }
 
        return $this->response->array(compact('user'))->setStatusCode(200); 
 
    }


    //Realiza un refresh al token entregado por el cliente.
    public function refreshToken(){
        $token = JWTAuth::getToken();

        if(! $token){
            return $this->response->errorUnauthorized("Token is invalid");
        }


        try{
            $refreshedToken = JWTAuth::refresh($token);
        }catch (JWTException $ex){
            $this->response->error("Something went wrong");
        }

        return $this->response->array(compact('refreshedToken'))->setStatusCode(200);
    }

















}
