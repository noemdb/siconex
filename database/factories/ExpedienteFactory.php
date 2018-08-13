<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Models\expedientes\Expediente::class, function (Faker $faker) {
    $fakerES = \Faker\Factory::create('es_ES');
    $fcreated = $faker->dateTimeBetween('2017-01-01',Carbon::now());
    $fupdated = $faker->dateTimeBetween($fcreated,Carbon::now());

    $estudiante_id = DB::table('estudiantes')
                ->select('estudiantes.*','expedientes.id as expediente_id')
                ->leftJoin('expedientes', 'expedientes.estudiante_id', '=', 'estudiantes.id')
                ->whereNull('expedientes.id')
                ->inRandomOrder()
                ->first()->id;

    $user_id = DB::table('users')
                ->select('users.*','rols.id as rols_id')
                ->leftJoin('rols', 'users.id', '=', 'rols.user_id')
                // ->whereNull('rols.user_id')
                ->inRandomOrder()
                ->first()->id;

    return [
    	'estudiante_id' => $estudiante_id,
        'user_id' => $user_id,
        'codigo' => $faker->isbn10,
        'descripcion' => $fakerES->sentence(10),
        'observacion' => $fakerES->sentence(10),
        'created_at' => $fcreated,
        'updated_at' => $fupdated,
    ];
});
