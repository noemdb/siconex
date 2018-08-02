<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Models\expedientes\Ruta::class, function (Faker $faker) {

    $fakerES = \Faker\Factory::create('es_ES');
    $fcreated = $faker->dateTimeBetween('2017-01-01',Carbon::now());
    $fupdated = $faker->dateTimeBetween($fcreated,Carbon::now());

    return [        
        'movimiento_id' => function () { 
        	return 
        	DB::table('movimientos')
				->select('movimientos.*','rutas.id as rutas_id')
				->leftJoin('rutas', 'rutas.movimiento_id', '=', 'movimientos.id')
				// ->whereNull('expedientes.id') // se usa cuando la realcion es 1:1
                ->inRandomOrder()
				->first()->id;
        },

        'nivel_id' => function () { 
        	return 
        	DB::table('nivels')
				->select('nivels.*','rutas.id as rutas_id')
				->leftJoin('rutas', 'rutas.nivel_id', '=', 'nivels.id')
				// ->whereNull('expedientes.id') // se usa cuando la realcion es 1:1
                ->inRandomOrder()
				->first()->id;
        },
        'observacion' => $fakerES->sentence(10),
        'created_at' => $fcreated,
        'updated_at' => $fupdated,
    ];
});
