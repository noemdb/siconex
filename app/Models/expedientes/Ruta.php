<?php

namespace App\Models\expedientes;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'movimiento_id', 'nivel_id', 'observacion'
    ];

    /*INI relaciones entre modelos*/
    public function Movimiento()
    {
        return $this->belongsTo('App\Models\expedientes\movimiemto');
    }
    public function nivel()
    {
        return $this->belongsTo('App\Models\expedientes\Nivel');
    }    
    /*FIN relaciones entre modelos*/
}
