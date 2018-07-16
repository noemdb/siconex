<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeders para tablas del sistema
        $this->call(UsersAdminTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
        $this->call(RolsTableSeeder::class);
        $this->call(TaskTableSeeder::class);
        $this->call(MessegeTableSeeder::class);
        $this->call(AlertTableSeeder::class);
        $this->call(LoginoutTableSeeder::class);
        $this->call(LogdbTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(SelectOptTableSeeder::class);

        // Seeders para tablas de la logica del negocio
        // $this->call(institucionTableSeeder::class);
        // $this->call(DireccionTableSeeder::class);
        // $this->call(ResponsableTableSeeder::class);
        // $this->call(PoaTableSeeder::class);
        // $this->call(MlogicoTableSeeder::class);
        // $this->call(MproblemaTableSeeder::class);
        // $this->call(PdeterminateTableSeeder::class);
        // $this->call(PcausaefectoTableSeeder::class);

        // $this->call(MobjetivoTableSeeder::class);
        
        // $this->call(MproductoTableSeeder::class);
        // $this->call(PindicadorTableSeeder::class);
        // $this->call(PverificadorTableSeeder::class);
        // $this->call(PsupuestoTableSeeder::class);
        // $this->call(MactividadTableSeeder::class);
        // $this->call(AfrecuenciaTableSeeder::class);
        // $this->call(FunidadTableSeeder::class);        
        // $this->call(AestadoTableSeeder::class);
        
        // $this->call(PresupuestariaTableSeeder::class);
    }
}
