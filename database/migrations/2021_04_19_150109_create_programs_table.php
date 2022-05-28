<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('Codigo');
            $table->string('Nombre');
            $table->string('descripcion')->nullable();
            $table->string('Abreviatura_Q10ID')->nullable();
            $table->string('N_Res_autorización');
            $table->string('F_Res_autorizacion');
            $table->string('Aplica_para_grupos')->nullable();
            $table->string('Aplica_para_preinscripciones')->nullable();
            $table->string('Tipo_de_evaluacion')->nullable();
            $table->string('Estado');
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
        Schema::dropIfExists('programs');
    }
}
