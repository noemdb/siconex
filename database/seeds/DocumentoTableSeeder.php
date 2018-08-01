<?php

use Illuminate\Database\Seeder;

class DocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 300; $i++) { 
            factory(App\Models\expedientes\Documento::class)->times(1)->create();
        }
    }
}