<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

/*Clases adicionadas*/
use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UserSettingsTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use Notifiable;
    // use SoftDeletes;
    // use UserSettingsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'email', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // nuemro de registros en User getCountAttribute
    public function getCountAttribute()
    {
      return $this->count();
    }
    // nuemro de perfiles registrados
    public function getCountTasksAttribute()
    {
      return $this->tasks->count();
    }

    /*INI relaciones entre modelos*/
    public function profile()
    {
        return $this->hasOne('App\Models\sys\Profile');
    }
    public function rols()
    {
        return $this->hasMany('App\Models\sys\Rol');
    }
    public function tasks()
    {
        return $this->hasMany('App\Models\sys\Task');
    }
    public function messeges()
    {
        return $this->hasMany('App\Models\sys\Messege');
    }
    public function alerts()
    {
        return $this->hasMany('App\Models\sys\Alert');
    }
    public function loginouts()
    {
        return $this->hasMany('App\Models\sys\Loginout');
    }
    public function logdbs()
    {
        return $this->hasMany('App\Models\sys\Logdb');
    }
    public function settings()
    {
        return $this->hasMany('App\Models\sys\Setting');
    }

    public function expedientes()
    {
        return $this->hasMany('App\Models\expedientes\Expediente');
    }
    public function movimientos()
    {
        return $this->hasMany('App\Models\expedientes\Movimiento');
    }
    ////////////////////INI logica del negocio///////////////////////////
    // public function poas()
    // {
        // return $this->hasMany('App\Models\poa\Poa');
    // }
    ////////////////////FIN logica del negocio///////////////////////////
    /*FIN relaciones entre modelos*/


    public function setPasswordAttribute($value){
        if (! empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    //is admin
    public function isAdmin()
    {
        $fecha = Carbon::now();
        $is_admin = $this->rols->where('rango', 'ADMIN')
                ->Where('finicial', '<=', $fecha)
                ->Where('ffinal', '>=', $fecha)
                ->count();
        if($is_admin>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function IsExpediente()
    {
        $fecha = Carbon::now();
        $IsExpediente = $this->rols->where('rango', 'ADMIN')
                ->whereIn('rol', ['ADMINISTRADOR','SUPERVISOR','AUDITOR','USUARIO'])
                ->Where('finicial', '<=', $fecha)
                ->Where('ffinal', '>=', $fecha)
                ->count();
        if($IsExpediente>0){
            return true;
        }
        else{
            return false;
        }
    }

    public static function getUsernameId($id)
    {

        $user = User::Where('id',$id)->first();
        if(isset($user)){
            return $user->username;
        }
        else{
            return '...';
        }

    }

}
