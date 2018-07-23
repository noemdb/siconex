<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Model;

class SelectOpt extends Model
{
	protected $fillable = [
	    'view','table', 'name','value'
	];

}
