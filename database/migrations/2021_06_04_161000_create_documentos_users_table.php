<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('documentos_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tipo_form');
            $table->string('descripcion')->nullable();
            $table->string('copia_de_cedula');
            $table->string('certificado_eps');
            $table->string('registro_civil');
            $table->string('acta_diploma_bachiller');
            $table->string('foto_documento');
            $table->string('resultados_saber');
            $table->string('ficha_inscripcion');
            $table->string('formato_tratamiento');
            $table->string('examen_medico');
            $table->string('examen_serologia');
            $table->string('soporte_pago');
            $table->string('resolucion_acta_homologacion')->nullable();
            $table->string('formato_estudio_homologacion')->nullable();
            $table->string('certificado_notas')->nullable();
            $table->string('contenidos_tematicos')->nullable();
            $table->string('carnet_vacunas')->nullable();
            $table->string('actualizacion_activa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('documentos_users');
    }

}
