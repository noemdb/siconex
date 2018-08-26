<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Models\expedientes\Estudiante::class, function (Faker $faker) {
    $fakerES = \Faker\Factory::create('es_ES');
    $fcreated = $faker->dateTimeBetween('2017-01-01',Carbon::now());
    $fupdated = $faker->dateTimeBetween($fcreated,Carbon::now());
    return [
        'firstname' => $fakerES->firstName,
        'lastname' => $fakerES->lastName,
        'ci' => substr($faker->imei,0,8),
        'email' => $fakerES->unique()->safeEmail,
        'urlimg' => 'img/profile_'.rand().'.png',
        'created_at' => $fcreated,
        'updated_at' => $fupdated,
    ];
});
