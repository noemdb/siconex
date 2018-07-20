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

        // INI tasks
        $testados = ['INICIADA', 'REPROGRAMADA', 'FINALIZADA'];
        foreach ($testados as $key => $value) {
            DB::table('select_opts')->insert([
                'table' => "tasks",
                'name' => "estado",
                'value' => $value,
                'view' => "tasks.create",
            ]);
        }

        $ttipo = ['primary'=>'Primaria', 'secondary'=>'Secundaria', 'success'=>'Alternativa', 'info'=>'Informativa', 'warning'=>'De alerta', 'danger'=>'Importante'];
        foreach ($ttipo as $key => $value) {
            DB::table('select_opts')->insert([
                'table' => "tasks",
                'name' => "tipo",
                'key' => $key,
                'value' => $value,
                'view' => "tasks.create",
            ]);
        }
        // FIN tasks

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
