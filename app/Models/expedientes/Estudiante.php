<?php

namespace App\Models\expedientes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Estudiante extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname','ci', 'email', 'urlimg'
    ];

    /*INI relaciones entre modelos*/
    public function expedientes()
    {
        // return $this->hasOne('App\Models\expedientes\Expediente');
        return $this->hasMany('App\Models\expedientes\Expediente');
    }
    public function estados()
    {
        return $this->hasMany('App\Models\expedientes\Estado');
    }
    public function carreras()
    {
        return $this->hasMany('App\Models\expedientes\Carrera');
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
