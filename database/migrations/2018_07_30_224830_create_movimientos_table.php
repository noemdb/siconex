<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('expediente_id')->unsigned();
            $table->foreign('expediente_id')
                  ->references('id')
                  ->on('expedientes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->integer('nivel_id')->unsigned();
            $table->foreign('nivel_id')
                  ->references('id')
                  ->on('nivels')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->string('descripcion',255);
            $table->string('observacion',255)->nullable();

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
        Schema::dropIfExists('movimientos');
    }
}
