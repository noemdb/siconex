<?php

namespace App\Models\expedientes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Expediente extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estudiante_id', 'codigo', 'descripcion', 'observacion'
    ];

    /*INI relaciones entre modelos*/
    public function documentos()
    {
        return $this->hasMany('App\Models\expedientes\Documento');
    }

    public function movimientos()
    {
        return $this->hasMany('App\Models\expedientes\Movimiento');
    }

    public function estudiante()
    {
        return $this->belongsTo('App\Models\expedientes\Estudiante');
    }

    /*FIN relaciones entre modelos*/
}
