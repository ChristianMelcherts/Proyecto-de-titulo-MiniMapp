<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

use Excel;



class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sends = null, $sender = null)
    {   
        

        if(isset($sends) and isset($sender)){
            return view('reportes.index', array('sends'=>$sends, 'sender'=>$sender));
        }else{
            $sender = $this->getAll();
            $sends = $this->paginadorManual($sender, 15);
            return view('reportes.index', array('sends'=>$sends, 'sender'=>$sender)); 

        }
        
    }

    public function filter()
    {
        
        $fecha_inicio = Input::get('fecha_inicio');
        $fecha_final = Input::get('fecha_final');

        $date = explode('-', $fecha_inicio);
        $fecha_inicio = $date[0].$date[1].$date[2].' 00:00:00';

        $date = explode('-', $fecha_final);
        $fecha_final = $date[0].$date[1].$date[2].' 23:59:59';



        
        $query = $this->formatDateQuery($fecha_inicio, $fecha_final);
        $sender = DB::select($query);


        if($sender != null ){
            $sends = $this->paginadorManual($sender, 15);  
        }else{
            $sends = array('data'=>0);
        }
        
        return Response::json($sends);
    }
    public function filterExport()
    {
        
        $fecha_inicio = Input::get('fecha_inicio');
        $fecha_final = Input::get('fecha_final');

        $date = explode('-', $fecha_inicio);
        $fecha_inicio = $date[0].$date[1].$date[2].' 00:00:00';

        $date = explode('-', $fecha_final);
        $fecha_final = $date[0].$date[1].$date[2].' 23:59:59';

        $query = $this->formatDateQuery($fecha_inicio, $fecha_final);
        $sender = DB::select($query);
        return $sender;
    }

    public function paginadorManual($data, $perPage = 10, $pageName = 'page', $page = null)
    {
        
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $collection = new Collection($data);
        $perPage = count($collection);
        
        $currentPageSearchResults = $collection-> slice (($currentPage - 1) * $perPage, $perPage)->all();
        $page = $page ?: Paginator::resolveCurrentPage($pageName);
        $data = new LengthAwarePaginator($currentPageSearchResults, count($collection), 
            $perPage, $page,[
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => $pageName,
        ]);

        return $data;

    }
  
    public function getAll()
    {
        $fecha_inicio = "19000101 00:00:00";
        $fecha_final = $this->getServerDate();

        $query = $this->formatDateQuery($fecha_inicio, $fecha_final);

        //
        //return $query;
        //
        $sends = DB::select($query);
        $sends = $this->paginadorManual($sends, 15);

        return Response::json($sends);
        //return $sends;
    }

    public function formatDateQuery($fecha_inicio, $fecha_final)
    {
        $query = "exec spa_givr_registro_filt_fecha ";
        $query .= '\''.$fecha_inicio.'\''.', ';
        $query .= '\''.$fecha_final.'\'';
        
        return $query;
    }

    public function formatDateReporte($date)
    {
        //
    }
    

    public function export()
    {
        $fecha_i = Input::get('fecha_inicio');
        $fecha_f = Input::get('fecha_final');
        $name = "Registro de Abandono ".$fecha_i." ".$fecha_f;
        Excel::create($name, function($excel)
        {
            $excel->sheet('Listado de Abandono', function($sheet) 
            {
                $sheet->setAutoSize(true);
                $i = 1;
                $sheet->row($i, array("Nr. registro", "Skill", "Empresa", "Fecha", 
                    "Telefono", "Espera", "Enviado", "SMS", "Respuesta", "F. Envio"));
                
                $sheet->cell('A1:D1', function($cells)
                {
                    $cells->setBackground('#000000');
                    $cells->setFontColor('#ffffff');
                });
                

                $i++;
            
                $sends = $this->filterExport();
                
                foreach($sends as $send)
                {
                    if(isset($send) != false){

                        $send->fc_inicio = substr($send->fc_inicio, 0, -4);

                        if(isset($send->fecha_envio_sms)){
                            $send->fecha_envio_sms = substr($send->fecha_envio_sms, 0, -4);
                        }else{
                            $send->fecha_envio_sms = "Pendiente"; 
                        }
                        if(isset($send->gl_respuesta_envio) == false){
                            $send->gl_respuesta_envio = "Pendiente"; 
                        }

                        $sheet->row($i, array(
                            $send->id_registro,
                            $send->nm_skill,
                            $send->nm_empresa,
                            $send->fc_inicio,
                            $send->nr_telefono,
                            $send->vl_tiempo_espera,
                            $send->sms_enviado,
                            $send->gl_sms_definido,
                            $send->gl_respuesta_envio,
                            $send->fecha_envio_sms
                            ));
                        $i++;  
                    }
                    
                }
            });
            
        })->download('csv');
        
    }

    public function getServerDate()
    {
        $response = DB::select('exec spa_givr_fecha_servidor');
        $response = $response[0]->response;
        $response = explode( ' ', $response);
        $date = explode('-', $response[0]);
        $response = $date[0].$date[1].$date[2].' '.$response[1];
        return ($response);
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
    public function store($sender)
    {
        
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
    public function edit($sender)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
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
?>
