<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Models\expedientes\Documento::class, function (Faker $faker) {

    $fakerES = \Faker\Factory::create('es_ES');
    $fcreated = $faker->dateTimeBetween('2017-01-01',Carbon::now());
    $fupdated = $faker->dateTimeBetween($fcreated,Carbon::now());
    $expediente_id = DB::table('expedientes')
                ->select('expedientes.*')
                // ->whereNull('expedientes.id')
                ->inRandomOrder()
                ->first()->id;

    $tipo = DB::table('select_opts')
                ->where('table','documentos')
                ->where('view','documentos.create')
                ->where('name','tipo')
                ->inRandomOrder()
                ->first()->value;

    $arr_SINO = ['SI'=>'SI','NO'=>'NO'];

    return [
    	'expediente_id' => $expediente_id,
        'tipo' => $tipo,
        'descripcion' => $fakerES->sentence(10),
        'observacion' => $fakerES->sentence(10),
        'original' => array_rand($arr_SINO,1),
        'copia' => array_rand($arr_SINO,1),
        'created_at' => $fcreated,
        'updated_at' => $fupdated,
    ];
});
