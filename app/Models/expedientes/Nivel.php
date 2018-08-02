<?php

namespace App\Models\expedientes;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'almacen_id', 'numero', 'descripcion'
    ];

    /*INI relaciones entre modelos*/
    public function rutas()
    {
        return $this->hasOne('App\Models\expedientes\Ruta');
    }

    public function almacen()
    {
        return $this->belongsTo('App\Models\expedientes\Almacen');
    }
    /*FIN relaciones entre modelos*/
}
