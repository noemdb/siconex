<?php

namespace App\Models\expedientes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Documento extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'expediente_id','tipo', 'descripcion', 'observacion', 'original', 'copia'
    ];

    /*INI relaciones entre modelos*/
    public function expediente()
    {
        return $this->belongsTo('App\Models\expedientes\Expediente');
    }
    /*FIN relaciones entre modelos*/

}
