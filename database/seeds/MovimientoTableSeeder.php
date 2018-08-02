<?php

use Illuminate\Database\Seeder;

class MovimientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		for ($i=0; $i < 400; $i++) { 
            factory(App\Models\expedientes\Movimiento::class)->times(1)->create();
        }
    }
}
