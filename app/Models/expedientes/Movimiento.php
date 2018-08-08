<?php

namespace App\Models\expedientes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Movimiento extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'expediente_id','user_id','nivel_id', 'descripcion', 'observacion'
    ];

    /*INI relaciones entre modelos*/

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function expediente()
    {
        return $this->belongsTo('App\Models\expedientes\Expediente');
    }
    // public function almacen()
    // {
    //     return $this->belongsTo('App\Models\expedientes\Almacen');
    // }
    public function nivel()
    {
        return $this->belongsTo('App\Models\expedientes\Nivel');
    }
    /*FIN relaciones entre modelos*/
}
