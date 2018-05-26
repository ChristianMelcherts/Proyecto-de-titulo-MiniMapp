<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beneficios;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class BeneficiosController extends BaseController
{
    public function index()
    {
      

        $beneficios = DB::table('beneficios')->paginate(15);
        return view('beneficios.index', array('beneficios'=>$beneficios));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beneficios.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_beneficio)
    {   
        $beneficios          = Beneficios::find($id_beneficio);

        return view('beneficios.edit', array('beneficios'=>$beneficios));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $rules = array(
            'nombre'=> 'required|unique:beneficios,nombre',
            'codigo' => 'required|max:5|unique:beneficios,codigo',
            'descripcion'=>'required',
            'activo'=>'required');


        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        $beneficios = new Beneficios();

        $response = DB::select('SELECT max(id_beneficio)+1 as response FROM beneficios');
        
        $beneficios->id_beneficio         = $response[0]->response;
        $beneficios->nombre            = Input::get('nombre');
        $beneficios->codigo            = Input::get('codigo');
        $beneficios->descripcion         = Input::get('descripcion');
        $beneficios->activo           = Input::get('activo');
        $beneficios->save();

        return Redirect::to('beneficios')->with('flash_message', 'Beneficio creado exitosamente');
       
       
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update($id_beneficio)
    {
    	$beneficios = Beneficios::find($id_beneficio);

http://localhost/MiniMapp/public/beneficio/3/edit
        $rules = array(
            'nombre'=> 'required|unique:beneficios,nombre',
            'codigo' => 'required|max:5|unique:beneficios,codigo',
            'descripcion'=>'required',
            'activo'=>'required');

        if($beneficios->nombre == Input::get('nombre')){
        	$rules['nombre'] = 'required';
        }
        if($beneficios->codigo == Input::get('codigo')){
        	$rules['codigo'] = 'required|max:5';
        }

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        $response = DB::select('SELECT max(id_beneficio)+1 as response FROM beneficios');
        
        $beneficios->id_beneficio         = $response[0]->response;
        $beneficios->nombre            = Input::get('nombre');
        $beneficios->codigo            = Input::get('codigo');
        $beneficios->descripcion         = Input::get('descripcion');
        $beneficios->activo           = Input::get('activo');
        $beneficios->save();

        return Redirect::to('beneficios')->with('flash_message', 'Beneficio modificado exitosamente');

       
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_beneficio)
    {
        $beneficios = Beneficios::find($id_beneficio);
        $beneficios->delete();
        Session::flash('flash_message', 'Beneficio eliminada exitosamente');
        return Response::json('Beneficio eliminada exitosamente');
    }
}
