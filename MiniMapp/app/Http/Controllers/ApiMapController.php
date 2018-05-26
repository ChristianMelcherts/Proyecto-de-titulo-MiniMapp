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


class ApiMapController extends BaseController
{
    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    public function index($coord, $login, Request $request)
    { 
        $coord = explode(',', $coord);
        
        $latitude = $coord[0];
        $longitude = $coord[1];
        $this->actualizar($login, $latitude, $longitude);

        $localization = $this->getLocalization($login);
  

        $params = [
            'pins' => $localization,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'login' => $login

        ];

        $view = view('app.mapa', $params);

        $json = json_decode($view);
        return response()->json($json);
    }

    public function getLocalization($login)
    {
        /*
        $query = "SELECT usuarios.id_usuarios, usuarios.login, usuarios.nombre,";
        $query .= "localizacion.id_localizacion,localizacion.latitud,localizacion.longitud ";
        $query .= "FROM localizacion, usuarios ";
        $query .= "WHERE localizacion.id_usuarios = usuarios.id_usuarios ";
        */

        
        $query1 = "SELECT * FROM usuarios WHERE login = '{$login}'";
        $usuario = DB::select($query1);
        $id_usuarios = $usuario[0]->id_usuarios;
        //return  $id_usuarios;


        $query = "SELECT c.id_flags, c.flag, c.activo ";
        $query .= "FROM usuarios a, usuarios_flags b, flags c ";
        $query .= "WHERE a.id_usuarios = '{$id_usuarios}' AND a.activo = 1 AND b.activo = 1 AND c.activo = 1 AND a.id_usuarios = b.id_usuarios AND b.id_flags = c.id_flags ";
        $flags = DB::select($query);

        $count_flags = count($flags);
        if ($count_flags == 0)
        {
            $query = "SELECT usuarios.id_usuarios, usuarios.login, usuarios.nombre,";
            $query .= "localizacion.id_localizacion, localizacion.latitud, localizacion.longitud ";
            $query .= "FROM localizacion, usuarios ";
            $query .= "WHERE localizacion.id_usuarios = usuarios.id_usuarios and usuarios.id_usuarios = '{$id_usuarios}'";
            $response = DB::select($query);
            return $response;


        }    




       
        $query = "SELECT z.id_usuarios, z.login, z.nombre, l.id_localizacion, l.latitud, l.longitud ";
        $query .= "FROM flags X, usuarios_flags Y, usuarios z, localizacion l ";
        $query .= "WHERE X.id_flags IN(";

        $i=0;

        foreach ($flags as $flag) {
            if($i!= 0) $query .= ",";

            $i++;
            $query .= "'{$flag->id_flags}'";
        }
       

        $query .= ") AND X.id_flags = Y.id_flags AND Y.id_usuarios = z.id_usuarios AND Y.id_usuarios = l.id_usuarios ";
        $query .= "GROUP BY z.id_usuarios, z.login, z.nombre, l.id_localizacion, l.latitud, l.longitud ";
        $response = DB::select($query);
        return $response;
    }

    public function actualizar($login, $latitude, $longitude)
    {
        $query1 = "SELECT * FROM usuarios WHERE login = '{$login}'";
        $usuario = DB::select($query1);
        $id_usuarios = $usuario[0]->id_usuarios;

        $localizacion = Localizacion::where('id_usuarios', $id_usuarios)->first();

        if(!$localizacion){
            $localizacion = new Localizacion();

            $response = DB::select('SELECT max(id_localizacion)+1 as response FROM localizacion');
            $id_localizacion = $response[0]->response;

            $localizacion->id_localizacion  = $id_localizacion;
            $localizacion->id_usuarios      = $id_usuarios;
            $localizacion->latitud          = $latitude;
            $localizacion->longitud         = $longitude;
            $localizacion->save();
            return "created";

        }else{
            $localizacion->latitud          = $latitude;
            $localizacion->longitud         = $longitude;
            $localizacion->save();
            return "updated";
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