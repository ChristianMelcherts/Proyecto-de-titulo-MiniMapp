<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flags;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;


class FlagsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //return "hola mundo";

        $flags = DB::table('flags')->paginate(15);
        return view('flags.index', array('flags'=>$flags));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flags.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_flags)
    {   
        $flag          = flags::find($id_flags);

        return view('flags.edit', array('flag'=>$flag));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $rules = array(
            'flag'=> 'required|unique:flags,flag',
            'activo'=>'required');


        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        $flags = new Flags();

        $response = DB::select('SELECT max(id_flags)+1 as response FROM flags');
        
        $flags->id_flags         = $response[0]->response;
        $flags->flag            = Input::get('flag');
        $flags->descripcion         = Input::get('descripcion');
        $flags->activo           = Input::get('activo');
        $flags->save();

        return Redirect::to('flags')->with('flash_message', 'Flag creada exitosamente');
       
    }

    

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update($id_flags)
    {
        $flags = Flags::find($id_flags);


        if(Input::get('flag') == $flags->flag){
            $rules = array(
            'flag'=> 'required',
            'activo'=>'required');
        }else{
            $rules = array(
            'flag'=> 'required|unique:flags,flag',
            'activo'=>'required'); 
        }

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        $flags->flag            = Input::get('flag');
        $flags->descripcion         = Input::get('descripcion');
        $flags->activo           = Input::get('activo');


        $flags->save();
        
        
        return Redirect::route('flags')->with('flash_message', 'Flags editado exitosamente');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_flags)
    {
        $flag = Flags::find($id_flags);
        $flag->delete();
        Session::flash('flash_message', 'Flag eliminada exitosamente');
        return Response::json('Flag eliminada exitosamente');
    }
}
