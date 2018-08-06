<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Models\expedientes\Estado::class, function (Faker $faker) {

    $fakerES = \Faker\Factory::create('es_ES');
    $fcreated = $faker->dateTimeBetween('2017-01-01',Carbon::now());
    $fupdated = $faker->dateTimeBetween($fcreated,Carbon::now());

    $arr_estado = ['Regular'=>'Regular','Suspendido'=>'Suspendido','Preinscrito'=>'Preinscrito','Egresado'=>'Egresado'];

    return [
    	'estudiante_id' => function () { 
        	return 
        	DB::table('estudiantes')
				->select('estudiantes.*','estados.id as estado_id')
				->leftJoin('estados', 'estados.estudiante_id', '=', 'estudiantes.id')
				->whereNull('estados.id')
                ->inRandomOrder()
				->first()->id;
        },
        'estado' => array_rand($arr_estado,1),
        'created_at' => $fcreated,
        'updated_at' => $fupdated,
    ];
});
