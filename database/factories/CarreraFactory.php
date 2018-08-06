<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Models\expedientes\Carrera::class, function (Faker $faker) {

    $fakerES = \Faker\Factory::create('es_ES');
    $fcreated = $faker->dateTimeBetween('2017-01-01',Carbon::now());
    $fupdated = $faker->dateTimeBetween($fcreated,Carbon::now());
    $fegreso = $faker->dateTimeBetween($fcreated,$fupdated );
    $carrera = DB::table('select_opts')
                    ->where('table','carreras')
                    ->where('view','carreras.create')
                    ->where('name','nombre')
                    ->inRandomOrder()
                    ->first()->value;

    return [
    	'estudiante_id' => function () { 
        	return 
        	DB::table('estudiantes')
				->select('estudiantes.*','expedientes.id as expediente_id')
				->leftJoin('expedientes', 'expedientes.estudiante_id', '=', 'estudiantes.id')
				// ->whereNull('expedientes.id')
                ->inRandomOrder()
				->first()->id;
        },
        'nombre' => $carrera ,
        'padminsion' => rand(1, 2),
        'fingreso'=>$fcreated,
        'fegreso'=>$fegreso,
        'created_at' => $fcreated,
        'updated_at' => $fupdated,
    ];
});
