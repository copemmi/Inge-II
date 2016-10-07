<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetModelosMaquinas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DET_MODELOS_MAQUINAS', function (Blueprint $table) {
            $table->string('cod_modelo',40);
            $table->string('cod_maquina',40);
            $table->integer('cantidad',3)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DET_MODELOS_MAQUINAS');
    }
}
