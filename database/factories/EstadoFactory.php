<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Models\expedientes\Estado::class, function (Faker $faker) {

    $fakerES = \Faker\Factory::create('es_ES');
    $fcreated = $faker->dateTimeBetween('2017-01-01',Carbon::now());
    $fupdated = $faker->dateTimeBetween($fcreated,Carbon::now());

    $estudiante_id = DB::table('estudiantes')
                ->select('estudiantes.*')
                // ->whereNull('expedientes.id')
                ->inRandomOrder()
                ->first()->id;

    $estado = DB::table('select_opts')
                ->where('table','estados')
                ->where('view','estados.create')
                ->where('name','estado')
                ->inRandomOrder()
                ->first()->value;

    return [
    	'estudiante_id' => $estudiante_id,
        'estado' => $estado,
        'created_at' => $fcreated,
        'updated_at' => $fupdated,
    ];
});
