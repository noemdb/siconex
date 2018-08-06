<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNivelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nivels', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('almacen_id')->unsigned();
            $table->foreign('almacen_id')
                  ->references('id')
                  ->on('almacens')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->string('codigo',32);
            $table->string('descripcion',255);

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
        Schema::dropIfExists('nivels');
    }
}
