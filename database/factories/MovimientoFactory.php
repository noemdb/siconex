<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Models\expedientes\Movimiento::class, function (Faker $faker) {

    $fakerES = \Faker\Factory::create('es_ES');
    $fcreated = $faker->dateTimeBetween('2017-01-01',Carbon::now());
    $fupdated = $faker->dateTimeBetween($fcreated,Carbon::now());

    $expdiente_id = DB::table('expedientes')
                ->select('expedientes.*','movimientos.id as movimientos_id')
                ->leftJoin('movimientos', 'movimientos.expediente_id', '=', 'expedientes.id')
                // ->whereNull('expedientes.id')
                ->inRandomOrder()
                ->first()->id;

    $user_id = DB::table('users')
                ->select('users.*','rols.id as rols_id')
                ->leftJoin('rols', 'users.id', '=', 'rols.user_id')
                // ->whereNull('rols.user_id')
                ->inRandomOrder()
                ->first()->id;

    $nivel_id = DB::table('nivels')
                ->select('nivels.*','movimientos.id as movimientos_id')
                ->leftJoin('movimientos', 'movimientos.nivel_id', '=', 'nivels.id')
                // ->where('nivels.almacen_id',$almacen_id)
                // ->whereNull('expedientes.id')
                ->inRandomOrder()
                ->first()->id;

    return [
    	'expediente_id' => $expdiente_id,
        'user_id' => $user_id,
        // 'almacen_id' => $almacen_id,
        'nivel_id' => $nivel_id,

        'descripcion' => $fakerES->sentence(10),
        'observacion' => $fakerES->sentence(10),
        'created_at' => $fcreated,
        'updated_at' => $fupdated,
    ];
});
