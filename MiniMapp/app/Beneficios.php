<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Beneficios extends Model 
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'beneficios';
    protected $primaryKey = 'id_beneficio';



    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_beneficio', 'nombre', 'codigo', 'descripcion', 'activo','created_at', 'updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
