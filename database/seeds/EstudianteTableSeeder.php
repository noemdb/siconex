<?php

use Illuminate\Database\Seeder;

class EstudianteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 70; $i++) {
            factory(App\Models\expedientes\Estudiante::class)->times(1)->create();
        }
    }
}
