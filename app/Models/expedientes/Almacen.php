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
        'responsable', 'descripcion', 'direccion'
    ];

    /*INI relaciones entre modelos*/
    public function nivels()
    {
        return $this->hasOne('App\Models\expedientes\Nivel');
    }
    /*FIN relaciones entre modelos*/
}
