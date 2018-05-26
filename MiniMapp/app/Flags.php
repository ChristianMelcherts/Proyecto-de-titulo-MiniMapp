<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Flags extends Model 
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'flags';
    protected $primaryKey = 'id_flags';



    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_flags', 'flag', 'descripcion', 'activo', 'created_at', 'updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
