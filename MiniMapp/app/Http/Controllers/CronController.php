<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cron;
use \DateTime;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class CronController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->cd_tp_usuario != 1){
            Auth::logout();
            return Redirect::to('/')
                    ->with('mensaje_error', 'Tu sesión ha sido cerrada.');

        }
        
        $cron = Cron::find(1);
        $cron->hr_inicio_cron = $this->transFechaToHora($cron->hr_inicio_cron);
        $cron->hr_fin_cron = $this->transFechaToHora($cron->hr_fin_cron);
        return view('cron.index', array('cron'=>$cron));
    }


    public function transFechaToHora($date){
        $date = explode( ' ', $date);
        $date = substr_replace($date[1], "", -7);

        return $date;
    }

    public function transHoraToFecha($hora){
        $hora = '1900-01-01 '.$hora.':00';
        return $hora;

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
    public function update($id_conf_cron)
    {
 
        $cron = Cron::find('1');
        //////
        $rules = array(
            'bo_encendido'=> 'required',
            'nr_min_frecuencia'=> 'required',
            'hr_inicio_cron'=> 'required',
            'hr_fin_cron'=> 'required');
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()){
            return Redirect::back()->withErrors('Todos los campos son requeridos.');
        }

        $rules = array(
            'nr_min_frecuencia'=> 'numeric');
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()){
            return Redirect::back()->withErrors('La frecuencia debe ser un valor numérico');
        }


        
        $cron->hr_inicio_cron       = Input::get('hr_inicio_cron');
        $cron->hr_fin_cron          = Input::get('hr_fin_cron');
        $cron->nr_min_frecuencia    = Input::get('nr_min_frecuencia');
        $cron->bo_encendido         = Input::get('bo_encendido');

        //<!--comentar en caso de cambiar a sp 
        $cron->save();
        
        
        return Redirect::route('crons')->with('flash_message', 'Configuración actualizada exitosamente');
    }

    public function authTime($horaInicio, $horaFin){
        $validator = 0;

        $horaInicio = explode( ':', $horaInicio);
        $horaFin = explode( ':', $horaFin);

        
        if($horaInicio[0] < $horaFin[0]){
            $validator = 1;
            return $validator; 
            
            
        }elseif($horaInicio[0] == $horaFin[0]){
            $validator = 0;
            if($horaInicio[1] < $horaFin[1]){
               $validator = 1;
               
            return $validator; 
            }
             
        }
        return $validator; 
    }


    
}
