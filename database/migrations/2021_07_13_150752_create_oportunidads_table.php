<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOportunidadsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('oportunidads', function (Blueprint $table) {
            $table->id();
            $table->string('student_id'); //estudiante
            $table->string('agent_id');
            $table->string('inscription_id');
            $table->string('status');
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
        Schema::dropIfExists('oportunidads');
    }

}
