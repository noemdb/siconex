<?php

namespace App\Models\expedientes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Nivel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'almacen_id', 'codigo', 'descripcion'
    ];

    /*INI relaciones entre modelos*/
    public function almacen()
    {
        return $this->belongsTo('App\Models\expedientes\Almacen');
    }
    public function movimiento()
    {
        return $this->hasOne('App\Models\expedientes\Movimiento');
    }
    /*FIN relaciones entre modelos*/
}
