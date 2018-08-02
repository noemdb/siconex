<?php

namespace App\Models\expedientes;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
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
    public function expedientes()
    {
        return $this->hasOne('App\Models\expedientes\Expediente');
    }

    public function estados()
    {
        return $this->hasOne('App\Models\expedientes\Estado');
    }

    public function carreras()
    {
        return $this->hasOne('App\Models\expedientes\Carrera');
    }

    /*FIN relaciones entre modelos*/

    public function getFullNameAttribute()
    {
      return $this->firstname .' ' . $this->lastname;
    }

    // public function getEstadoAttribute()
    // {
    //   return $this->estados->last();
    // }

}
