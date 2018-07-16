<?php

use Illuminate\Database\Seeder;

class SelectOptTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	$arr_rol = ['CONTRA'=>'CONTRA','DIRCP'=>'DIRCP','CORCP'=>'CORCP','COMCP'=>'COMCP','ADMIN'=>'ADMIN','USUARIO'=>'USUARIO'];
    	foreach ($arr_rol as $key => $value) {
    		DB::table('select_opts')->insert([
	            'name' => "rol",
	            'value' => $value,
	            'table' => "rols",
	            'view' => "rol.create",
        	]);
    	}

    	$arr_rango = ['MASTER'=>'MASTER','USER'=>'USER'];
    	foreach ($arr_rango as $key => $value) {
    		DB::table('select_opts')->insert([
	            'name' => "rango",
	            'value' => $value,
	            'table' => "rols",
	            'view' => "rol.create",
        	]);
    	}

        $arr_estado = ['Activo'=>'Activo','Desactivo'=>'Desactivo'];
        foreach ($arr_estado as $key => $value) {
            DB::table('select_opts')->insert([
                'table' => "users",
                'name' => "is_active",
                'value' => $value,
                'view' => "rol.index",
            ]);
        }

        $aestados = ['INICIADA', 'REPROGRAMADA', 'FINALIZADA'];
        foreach ($aestados as $key => $value) {
            DB::table('select_opts')->insert([
                'table' => "aestados",
                'name' => "estado",
                'value' => $value,
                'view' => "aestados.create",
            ]);
        }

        $afrecuencias = ["Mensual"=>"12", "Bimensual"=>"6", "Trimestral"=>"4", "Cuatrimestral"=>"3", "Semestral"=>"2", "Anual"=>"1"];
        foreach ($afrecuencias as $name => $value) {
            DB::table('select_opts')->insert([
                'table' => "mactividads",
                'name' => $name,
                'value' => $value,
                'view' => "mactividads.create",
            ]);
        }

        $asignacion = ["TOTAL"=>"TOTAL", "ORDINARIO"=>"ORDINARIO"];
        foreach ($asignacion as $name => $value) {
            DB::table('select_opts')->insert([
                'table' => "presupuestarias",
                'name' => $name,
                'value' => $value,
                'view' => "presupuestarias.create",
            ]);
        }
        
    }
}
