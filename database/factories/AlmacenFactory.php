<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Models\expedientes\Almacen::class, function (Faker $faker) {

    $fakerES = \Faker\Factory::create('es_ES');
    $fcreated = $faker->dateTimeBetween('2017-01-01',Carbon::now());
    $fupdated = $faker->dateTimeBetween($fcreated,Carbon::now());

    return [
        'responsable' => $fakerES->firstName.' '.$fakerES->lastName,
        'descripcion' => $fakerES->sentence(10),
        'direccion' => $fakerES->address,
        'created_at' => $fcreated,
        'updated_at' => $fupdated,
    ];
});
