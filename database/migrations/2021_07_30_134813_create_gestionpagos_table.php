<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestionpagosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('gestionpagos', function (Blueprint $table) {
            $table->id();
            $table->string('pago_id');
            $table->string('estudent_id');
            $table->string('financial_id');
            $table->string('inscription_id');
            $table->string('status');
            $table->string('soporte_de_pago');
            $table->dateTime('creation_date', $precision = 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('gestionpagos');
    }

}
