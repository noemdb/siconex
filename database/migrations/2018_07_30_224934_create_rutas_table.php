<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('movimiento_id')->unsigned();
            $table->foreign('movimiento_id')
                  ->references('id')
                  ->on('movimientos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->integer('almacen_id')->unsigned();
            $table->foreign('almacen_id')
                  ->references('id')
                  ->on('almacens')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->integer('nivel_id')->unsigned();
            $table->foreign('nivel_id')
                  ->references('id')
                  ->on('nivels')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->string('observacion',255);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutas');
    }
}
