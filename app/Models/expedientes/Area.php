<?php

namespace App\Models\expedientes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Area extends Model
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
    public function movimientos()
    {
        return $this->hasMany('App\Models\expedientes\Movimiento');
    }
    /*FIN relaciones entre modelos*/

    public function getTruncDescripcionAttribute()
    {
        $string = $this->descripcion;
        $length = 4;
        $ellipsis = "...";
        $words = explode(' ', $string);
        if (count($words) > $length){
            return implode(' ', array_slice($words, 0, $length)) ." ". $ellipsis;
        }
        else{
            return $string;
        }
    }
}
