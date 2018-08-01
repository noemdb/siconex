<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Models\expedientes\Documento::class, function (Faker $faker) {

    $fakerES = \Faker\Factory::create('es_ES');
    $fcreated = $faker->dateTimeBetween('2017-01-01',Carbon::now());
    $fupdated = $faker->dateTimeBetween($fcreated,Carbon::now());

    $arr_SINO = ['SI'=>'SI','NO'=>'NO'];

    return [
    	'expediente_id' => function () { 
        	return 
        	DB::table('expedientes')
				->select('expedientes.*','documentos.id as documento_id')
				->leftJoin('documentos', 'documentos.expediente_id', '=', 'expedientes.id')
				// ->whereNull('expedientes.id')
                ->inRandomOrder()
				->first()->id;
        },
        'descripcion' => $fakerES->sentence(10),
        'observacion' => $fakerES->sentence(10),
        'original' => array_rand($arr_SINO,1),
        'copia' => array_rand($arr_SINO,1),
        'created_at' => $fcreated,
        'updated_at' => $fupdated,
    ];
});
