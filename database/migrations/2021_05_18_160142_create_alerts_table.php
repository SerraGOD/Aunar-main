<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alert_user_id');
            $table->string('alert_name'); //nombre
            $table->string('alert_description')->nullable(); //descripscion
            $table->string('alert_category')->nullable(); //categotia
            $table->string('alert_type'); //tipo
            $table->string('alert_send_type')->nullable(); //tipo de metodo de envio
            $table->string('alert_see_report')->nullable(); //ver en reporte
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
        Schema::dropIfExists('alerts');
    }
}
