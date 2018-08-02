<?php

namespace App\Models\expedientes;

use Illuminate\Database\Eloquent\Model;

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
    
}
