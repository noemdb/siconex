<?php

namespace App\Models\expedientes;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Estado extends Model
{

    use SoftDeletes;
    
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
        case 'Regular':
            $class = 'primary'; break;
        case 'Suspendido':
            $class = 'danger'; break;
        case 'Preinscrito':
            $class = 'info'; break;
        case 'Egresado':
            $class = 'success'; break;          
        default:
            $class = 'secondary'; break;
      }
      return $class;
    }
    
}
