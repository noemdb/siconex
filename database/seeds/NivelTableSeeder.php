<?php

use Illuminate\Database\Seeder;

class NivelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		for ($i=0; $i < 40; $i++) {
            factory(App\Models\expedientes\Nivel::class)->times(1)->create();
        }
    }
}
