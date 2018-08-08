<?php

use Illuminate\Database\Seeder;

class ExpedienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 50; $i++) {
            factory(App\Models\expedientes\Expediente::class)->times(1)->create();
        }
    }
}
