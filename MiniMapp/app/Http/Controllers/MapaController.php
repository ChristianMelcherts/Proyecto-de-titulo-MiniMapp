<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use App\Localizacion;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('mapa');
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
    public function edit($id_usuarios)
    {
        $localizacion = Localizacion::where('id_usuarios', $id_usuarios)->first();

        if(!$localizacion){
            $localizacion = new Localizacion();

            $response = DB::select('SELECT max(id_localizacion)+1 as response FROM localizacion');
            $id_localizacion = $response[0]->response;

            $localizacion->id_localizacion  = $id_localizacion;
            $localizacion->id_usuarios      = $id_usuarios;
            $localizacion->save();

        }
        $localizacion = Localizacion::where('id_usuarios', $id_usuarios)->first();

        return view('mapas.edit', array('localizacion'=>$localizacion));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id_localizacion)
    {
        $localizacion = Localizacion::find($id_localizacion);

        $rules = array(
            'latitud'=> 'required',
            'longitud'=>'required');
        

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        $localizacion->latitud      = Input::get('latitud');
        $localizacion->longitud     = Input::get('longitud');
        $localizacion->save();
        
        
        return Redirect::route('usuario.index')->with('flash_message', 'Coordenadas editadas exitosamente');

        
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
