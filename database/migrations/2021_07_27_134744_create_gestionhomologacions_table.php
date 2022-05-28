<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestionhomologacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestionhomologacions', function (Blueprint $table) {
            $table->id();
            $table->string('academic_id');
            $table->string('student_id');//estudiante
            $table->string('inscription_id');
            $table->string('acta_homologacion');
            $table->string('status');            
            $table->dateTime('creation_date',$precision = 0);
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
        Schema::dropIfExists('gestionhomologacions');
    }
}
