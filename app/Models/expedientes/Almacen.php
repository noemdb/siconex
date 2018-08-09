<?php

namespace App\Models\expedientes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Almacen extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','responsable', 'descripcion', 'direccion'
    ];

    /*INI relaciones entre modelos*/
    public function nivels()
    {
        return $this->hasMany('App\Models\expedientes\Nivel');
    }
    // public function movimientos()
    // {
    //     return $this->hasMany('App\Models\expedientes\Movimiento');
    // }
    /*FIN relaciones entre modelos*/
}
