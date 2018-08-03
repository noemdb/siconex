<?php

namespace App\Models\expedientes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Estado extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estudiante_id', 'estado'
    ];

    /*INI relaciones entre modelos*/
    public function estudiante()
    {
        return $this->belongsTo('App\Models\expedientes\Estudiante');
    }
    /*FIN relaciones entre modelos*/

    public function getClassAttribute()
    {      
      switch ($this->estado) {
        case '1':
            $class = 'primary'; break;
        case '2':
            $class = 'danger'; break;
        case '3':
            $class = 'infon'; break;
        case '4':
            $class = 'warning'; break;          
        default:
            $class = 'default'; break;
      }
      return $class;
    }
    
}
