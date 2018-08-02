<?php

namespace App\Models\expedientes;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'urlimg'
    ];

    /*INI relaciones entre modelos*/
    public function nivels()
    {
        return $this->hasOne('App\Models\expedientes\Nivel');
    }

    public function documentos()
    {
        return $this->hasOne('App\Models\expedientes\Documento');
    }

    public function estudiante()
    {
        return $this->belongsTo('App\Models\expedientes\Estudiante');
    }

    /*FIN relaciones entre modelos*/
}