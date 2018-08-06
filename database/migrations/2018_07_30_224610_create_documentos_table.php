<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('expediente_id')->unsigned();
            $table->foreign('expediente_id')
                  ->references('id')
                  ->on('expedientes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->enum('tipo', ['primary','secondary', 'success', 'info', 'warning', 'danger','default'])->default('default');
            $table->string('descripcion',255);
            $table->string('observacion',255);
            $table->enum('original', ['SI','NO'])->default('NO');
            $table->enum('copia', ['SI','NO'])->default('NO');
            
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
        Schema::dropIfExists('documentos');
    }
}
