<?php

namespace App\Models\expedientes;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'expediente_id', 'descripcion', 'observacion', 'original', 'copia'
    ];

    /*INI relaciones entre modelos*/
    public function estudiante()
    {
        return $this->belongsTo('App\Models\expedientes\Estudiante');
    }
    /*FIN relaciones entre modelos*/
    
}
