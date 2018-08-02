<?php

use Illuminate\Database\Seeder;

class RutaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		for ($i=0; $i < 200; $i++) { 
            factory(App\Models\expedientes\Ruta::class)->times(1)->create();
        }
    }
}
