<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class UsuariosFlags extends Model 
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios_flags';
    protected $primaryKey = 'id_usuarios_flag';



    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['activo', 'created_at', 'updated_at', 'id_usuarios_flag', 'id_flags', 'id_usuarios'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
