<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Roll extends Model 
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roll';
    protected $primaryKey = 'id_roll';


    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_roll', 'nombre ', 'descripcion'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
