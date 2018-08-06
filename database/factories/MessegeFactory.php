<?php

use Faker\Generator as Faker;

$factory->define(App\Models\sys\Messege::class, function (Faker $faker) {
	$arr_tipo = ['Conversación'=>'Conversación','Información'=>'Información','Alerta'=>'Alerta','Solicitud'=>'Solicitud'];
	$arr_estado = ['Enviado'=>'Enviado','Entregado'=>'Entregado'];
    $created_at = $faker->dateTimeBetween('2017-01-01','now');

    return [
        'mensaje' => $faker->sentence(10),
        'tipo' => array_rand($arr_tipo,1),
        'estado' => array_rand($arr_estado,1),
        'created_at'=>$created_at,
        'updated_at'=>$created_at,
        'user_id' => function () { 
        	return 
        	DB::table('users')
				->inRandomOrder()
				->first()->id;
        },
        'destino_user_id' => function () { 
        	return 
        	DB::table('users')
				->inRandomOrder()
				->first()->id;
        }
    ];
});
