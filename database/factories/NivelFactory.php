<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Models\expedientes\Nivel::class, function (Faker $faker) {

    $fakerES = \Faker\Factory::create('es_ES');
    $fcreated = $faker->dateTimeBetween('2017-01-01',Carbon::now());
    $fupdated = $faker->dateTimeBetween($fcreated,Carbon::now());

    return [
        'almacen_id' => function () { 
        	return 
        	DB::table('almacens')
				->select('almacens.*','nivels.id as nivels_id')
				->leftJoin('nivels', 'nivels.almacen_id', '=', 'almacens.id')
				// ->whereNull('expedientes.id') // se usa cuando la realcion es 1:1
                ->inRandomOrder()
				->first()->id;
        },
        'numero' => rand(1, 10),
        'descripcion' => $fakerES->sentence(10),
        'created_at' => $fcreated,
        'updated_at' => $fupdated,
    ];
});
