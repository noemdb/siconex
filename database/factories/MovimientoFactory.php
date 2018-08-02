<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Models\expedientes\Movimiento::class, function (Faker $faker) {

    $fakerES = \Faker\Factory::create('es_ES');
    $fcreated = $faker->dateTimeBetween('2017-01-01',Carbon::now());
    $fupdated = $faker->dateTimeBetween($fcreated,Carbon::now());

    return [
    	'expediente_id' => function () { 
        	return 
        	DB::table('expedientes')
				->select('expedientes.*','movimientos.id as movimientos_id')
				->leftJoin('movimientos', 'movimientos.expediente_id', '=', 'expedientes.id')
				// ->whereNull('expedientes.id')
                ->inRandomOrder()
				->first()->id;
        },
        'descripcion' => $fakerES->sentence(10),
        'observacion' => $fakerES->sentence(10),
        'created_at' => $fcreated,
        'updated_at' => $fupdated,
    ];
});
