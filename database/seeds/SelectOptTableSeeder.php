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

        // INI tasks
        $alertestados = ['Visto','No Visto'];
        foreach ($alertestados as $key => $value) {
            DB::table('select_opts')->insert([
                'table' => "alerts",
                'name' => "estado",
                'value' => $value,
                'view' => "alerts.create",
            ]);
        }

        $talertatipo = ['primary'=>'Primaria', 'secondary'=>'Secundaria', 'success'=>'Alternativa', 'info'=>'Informativa', 'warning'=>'De alerta', 'danger'=>'Importante'];
        foreach ($talertatipo as $key => $value) {
            DB::table('select_opts')->insert([
                'table' => "alerts",
                'name' => "tipo",
                'key' => $key,
                'value' => $value,
                'view' => "alerts.create",
            ]);
        }
        // FIN tasks

        // INI settings
        $arr_settname = [

        //view report
        'numregpag_userlist' => 'numregpag_userlist',
        'numregpag_profilelist' => 'numregpag_profilelist',
        'numregpag_rollist' => 'numregpag_rollist',

        //view topnavbar
        'topnavbar_messages' => 'topnavbar_messages',
        'topnavbar_tasks' => 'topnavbar_tasks',
        'topnavbar_alerts' => 'topnavbar_alerts',
        'topnavbar_logdbs' => 'topnavbar_logdbs',
        'topnavbar_loginouts' => 'topnavbar_loginouts',

        //sidebar nivel 1
        'sidebar_search' => 'sidebar_search',
        'sidebar_dashboard' => 'sidebar_dashboard',
        'sidebar_modelos' => 'sidebar_modelos',
        'sidebar_chart' => 'sidebar_chart',
        'sidebar_forms' => 'sidebar_forms',
        'sidebar_tables' => 'sidebar_tables',

        //sidebar nivel 2
        'sidebar_models_users' => 'sidebar_models_users',
        'sidebar_models_profiles' => 'sidebar_models_profiles',
        'sidebar_models_rols' => 'sidebar_models_rols',
        'sidebar_models_messenges' => 'sidebar_models_messenges',
        'sidebar_models_tasks' => 'sidebar_models_tasks',
        'sidebar_models_alerts' => 'sidebar_models_alerts',
        'sidebar_models_logdbs' => 'sidebar_models_logdbs',
        'sidebar_models_loginouts' => 'sidebar_models_loginouts',

        //sidebar nivel 3
        'sidebar_models_users_crud' => 'sidebar_models_users_crud',
        'sidebar_models_users_chart' => 'sidebar_models_users_chart',
        'sidebar_models_profiles_crud' => 'sidebar_models_profiles_crud',
        'sidebar_models_profiles_chart' => 'sidebar_models_profiles_chart',
        'sidebar_models_rols_chart' => 'sidebar_models_rols_chart',
        'sidebar_models_rols_crud' => 'sidebar_models_rols_crud',
        'sidebar_models_messenges_crud' => 'sidebar_models_messenges_crud',
        'sidebar_models_messenges_chart' => 'sidebar_models_messenges_chart',
        'sidebar_models_tasks_crud' => 'sidebar_models_tasks_crud',
        'sidebar_models_tasks_chart' => 'sidebar_models_tasks_chart',
        'sidebar_models_alerts_crud' => 'sidebar_models_alerts_crud',
        'sidebar_models_alerts_chart' => 'sidebar_models_alerts_chart',
        'sidebar_models_logdbs_crud' => 'sidebar_models_logdbs_crud',
        'sidebar_models_logdbs_chart' => 'sidebar_models_logdbs_chart',
        'sidebar_models_loginouts_crud' => 'sidebar_models_loginouts_crud',
        'sidebar_models_loginouts_chart' => 'sidebar_models_loginouts_chart'
        ];
        foreach ($arr_settname as $key => $value) {
            DB::table('select_opts')->insert([
                'table' => "settings",
                'name' => "name",
                'key' => $key,
                'value' => $value,
                'view' => "settings.create",
            ]);
        }
        // FIN settings

        $arr_settvalue = ['true'=>'Habilitado', 'false'=>'Deshabilitado'];
        foreach ($arr_settvalue as $key => $value) {
            DB::table('select_opts')->insert([
                'table' => "settings",
                'name' => "value",
                'key' => $key,
                'value' => $value,
                'view' => "settings.create",
            ]);
        }

        $carreras = ['Físcica'=>'Físcica', 'Química'=>'Química', 'Matemática'=>'Matemática', 'Educación'=>'Educación', 'Medicina'=>'Medicina', 'Ingeniería'=>'Ingeniería'];
        foreach ($carreras as $key => $value) {
            DB::table('select_opts')->insert([
                'table' => "carreras",
                'name' => "nombre",
                'key' => $key,
                'value' => $value,
                'view' => "carreras.create",
            ]);
        }

        $almacens = ['AN1'=>'AN1', 'AN2'=>'AN2', 'AN3'=>'AN3', 'AN4'=>'AN4', 'AN5'=>'AN5','AN6'=>'AN6', 'AN7'=>'AN7', 'AN8'=>'AN8', 'AN9'=>'AN9', 'AN10'=>'AN10'];
        foreach ($almacens as $key => $value) {
            DB::table('select_opts')->insert([
                'table' => "almacens",
                'name' => "nombre",
                'key' => $key,
                'value' => $value,
                'view' => "almacens.create",
            ]);
        }

        $arr = ['Acta'=>'Acta', 'Solicitud'=>'Solicitud', 'Inscripción'=>'Inscripción', 'Notas'=>'Notas', 'Constancia'=>'Constancia'];
        foreach ($arr as $key => $value) {
            DB::table('select_opts')->insert([
                'table' => "documentos",
                'name' => "tipo",
                'key' => $key,
                'value' => $value,
                'view' => "documentos.create",
            ]);
        }

        $arr = ['Regular'=>'Regular','Suspendido'=>'Suspendido','Preinscrito'=>'Preinscrito','Egresado'=>'Egresado'];
        foreach ($arr as $key => $value) {
            DB::table('select_opts')->insert([
                'table' => "estados",
                'name' => "estado",
                'key' => $key,
                'value' => $value,
                'view' => "estados.create",
            ]);
        }

        $arr = ['Almacenamiento'=>'Almacenamiento', 'Retiro'=>'Retiro', 'Préstamo'=>'Préstamo', 'Traslado'=>'Traslado', 'Desechar'=>'Desechar'];
        foreach ($arr as $key => $value) {
            DB::table('select_opts')->insert([
                'table' => "movimientos",
                'name' => "tipo",
                'key' => $key,
                'value' => $value,
                'view' => "movimientos.create",
            ]);
        }


    }
}
