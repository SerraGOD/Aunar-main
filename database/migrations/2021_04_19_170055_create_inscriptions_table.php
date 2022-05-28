<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('pri_nombre');
            $table->string('seg_nombre');
            $table->string('pri_apellido');
            $table->string('seg_apellido');
            $table->dateTime('fecha_nacimientos', $precision = 0);
            $table->string('municipio_nacimiento');
            $table->string('deparatamento_nacimiento');
            $table->string('pais_nacimiento');
            $table->dateTime('fecha_expedicion', $precision = 0);
            $table->string('municipio_expedicion');
            $table->string('deparatamento_expedicion');
            $table->string('pais_expedicion');
            $table->string('estado_civil');
            $table->string('rh');
            $table->string('genero');
            $table->string('libreta_militar')->nullable();
            $table->string('estrato');
            $table->string('direcion_recidencia');
            $table->string('municipio_recidencia');
            $table->string('deparatamento_recidencia');
            $table->string('pais_recidencia');
            $table->string('discapacidad');
            $table->string('numero_de_hijos');
            $table->unsignedBigInteger('programa_id');
            $table->string('periodo_academico');
            $table->string('jornada');
            $table->dateTime('fecha_saber', $precision = 0);
            $table->string('codigo_saber');
            $table->string('puntaje_saber');
            $table->string('colegio');
            $table->string('nivel_academico');
            $table->string('eps');
            $table->string('sisben');
            $table->string('status')->default(1);
            $table->string('asignado_agente')->default(0)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('programa_id')->references('id')->on('programs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('inscriptions');
    }

}
