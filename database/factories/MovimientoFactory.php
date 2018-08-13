<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Models\expedientes\Movimiento::class, function (Faker $faker) {

    $fakerES = \Faker\Factory::create('es_ES');
    $fcreated = $faker->dateTimeBetween('2017-01-01',Carbon::now());
    $fupdated = $faker->dateTimeBetween($fcreated,Carbon::now());

    $expdiente_id = DB::table('expedientes')
                ->select('expedientes.*')
                // ->leftJoin('movimientos', 'movimientos.expediente_id', '=', 'expedientes.id')
                // ->whereNull('expedientes.id')
                ->inRandomOrder()
                ->first()->id;

    $user_id = DB::table('users')
                ->select('users.*','rols.id as rols_id')
                ->leftJoin('rols', 'users.id', '=', 'rols.user_id')
                // ->whereNull('rols.user_id')
                ->inRandomOrder()
                ->first()->id;

    $area_id = DB::table('areas')
                ->select('areas.*','movimientos.id as movimientos_id')
                ->leftJoin('movimientos', 'movimientos.area_id', '=', 'areas.id')
                // ->where('areas.almacen_id',$almacen_id)
                // ->whereNull('expedientes.id')
                ->inRandomOrder()
                ->first()->id;

    $tipo = DB::table('select_opts')
                ->where('table','movimientos')
                ->where('view','movimientos.create')
                ->where('name','tipo')
                ->inRandomOrder()
                ->first()->value;

    return [
    	'expediente_id' => $expdiente_id,
        'user_id' => $user_id,
        // 'almacen_id' => $almacen_id,
        'area_id' => $area_id,

        'tipo' => $tipo,
        'descripcion' => $fakerES->sentence(10),
        'observacion' => $fakerES->sentence(10),
        'created_at' => $fcreated,
        'updated_at' => $fupdated,
    ];
});
