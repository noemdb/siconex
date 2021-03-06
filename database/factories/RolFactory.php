<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Models\sys\Rol::class, function (Faker $faker) {

    $arr_rol = ['ADMINISTRADOR'=>'ADMINISTRADOR','SUPERVISOR'=>'SUPERVISOR','AUDITOR'=>'AUDITOR','USUARIO'=>'USUARIO'];
	$arr_rango = ['MASTER'=>'MASTER','USER'=>'USER'];
    $ffinal = $faker->dateTimeBetween('2017-01-01', Carbon::now());
	$finicial = $faker->dateTimeBetween('2017-01-01',$ffinal);
    return [
        'rol' => array_rand($arr_rol,1),
        'rango' => array_rand($arr_rango,1),
        'descripcion' => $faker->sentence(10),
        'finicial' => $finicial,
        'ffinal' => $ffinal,
        'created_at' => $faker->dateTimeBetween('2017-01-01',Carbon::now()),
        'user_id' => function () {
        	return
        	DB::table('users')
				->select('users.*','rols.id as rols_id')
				->leftJoin('rols', 'users.id', '=', 'rols.user_id')
				// ->whereNull('rols.user_id')
                ->inRandomOrder()
				->first()->id;
        }
    ];
});
