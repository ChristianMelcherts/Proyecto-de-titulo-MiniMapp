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
use App\UsuariosFlags;


class ApiFlagController extends BaseController
{

    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    public function index($login)
    {
        $id_usuarios = $this->getUser($login);
        $flags =  $this->getFlagUser($id_usuarios);

        //dd($flagsUser);

        $view = view('app.flags', ['flags' => $flags]);

        $json = json_decode($view);
        return response()->json($json);

    }

    
    public function getUser($login)
    {  
        $query1 = "SELECT * FROM usuarios WHERE login = '{$login}'";
        $usuario = DB::select($query1);
        $id_usuarios = $usuario[0]->id_usuarios;
        return $id_usuarios;

    }
    
    public function getFlagUser($id_usuarios)
    {
        $query = <<<SQL

                        SELECT
                            flags.id_flags,
                            flags.flag,
                            IFNULL(
                                (
                                SELECT
                                    usuarios_flags.activo
                                FROM
                                    usuarios_flags
                                WHERE
                                    usuarios_flags.id_flags = flags.id_flags AND usuarios_flags.id_usuarios = $id_usuarios
                            ),
                            0
                            ) AS activo,
                            $id_usuarios AS id_usuario
                        FROM
                            flags
                        WHERE
                            flags.activo = 1
SQL;

    $response = DB::select($query);
    return $response;       
        
    }


    public function alterFlag()
    {

        $id_flags = Input::get('id_flags');
        $id_usuario =   Input::get('id_usuario');
        $activo     =   Input::get('activo');

        $activoValue = 1;

        if($activo != 'true' || $activo == false)
        {
            $activoValue = 0;
        }

        $activo = $activoValue;

        $query = "SELECT * FROM usuarios_flags WHERE id_flags = '{$id_flags}' and id_usuarios = '{$id_usuario}'";
        $usuario_flag = DB::select($query);
       
        
        if(!$usuario_flag)
        {
            $UsuariosFlags = new UsuariosFlags();

            $response = DB::select('SELECT max(id_usuarios_flag)+1 as response FROM usuarios_flags');
            $id_usuarios_flag = $response[0]->response;

            $UsuariosFlags->id_usuarios_flag     = $id_usuarios_flag;
            $UsuariosFlags->id_flags             = $id_flags;
            $UsuariosFlags->id_usuarios          = $id_usuario;
            $UsuariosFlags->activo               = $activo;
            $UsuariosFlags->save();
            return $UsuariosFlags;
        }else{
            $id_usuarios_flag = $usuario_flag[0]->id_usuarios_flag;

            $UsuariosFlags = UsuariosFlags::find($id_usuarios_flag);
         

            $UsuariosFlags->activo = $activo;
            $UsuariosFlags->save();

            return $UsuariosFlags;
            
        }     


    }






    
















    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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