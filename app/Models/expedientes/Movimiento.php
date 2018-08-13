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
        'expediente_id','user_id','area_id','tipo', 'descripcion', 'observacion'
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
    public function area()
    {
        return $this->belongsTo('App\Models\expedientes\Area');
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

    public function getClassAttribute()
    {
      switch ($this->tipo) {
        case 'Almacenamiento':
            $class = 'primary'; break;
        case 'Retiro':
            $class = 'danger'; break;
        case 'Préstamo':
            $class = 'info'; break;
        case 'Traslado':
            $class = 'secondary'; break;
        case 'Desechar':
            $class = 'success'; break;
        default:
            $class = 'default'; break;
      }
      return $class;
    }
}
