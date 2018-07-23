<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
	/*INI relaciones entre modelos*/
	public function user()
    {
        return $this->belongsTo('App\User');
    }
    /*FIN relaciones entre modelos*/

	protected $fillable = [
	    'user_id','destino_user_id', 'mensaje','tipo','estado','finicial','ffinal'
	];


    public function getTruncMensajeAttribute()
	{
		$string = $this->mensaje;
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
}
