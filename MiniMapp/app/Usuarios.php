<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Usuarios extends Model 
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuarios';


    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_usuarios', 'nombre ', 'correo', 'password', 'login', 'token', 'activo', 'created_at', 'updated_at ', 'id_roll'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];
}
