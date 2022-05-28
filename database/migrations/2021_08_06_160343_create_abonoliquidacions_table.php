<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonoliquidacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonoliquidacions', function (Blueprint $table) {           
                $table->id();
                $table->unsignedBigInteger('id_liquidation');
                $table->string('id_liquidacionSerie');
                $table->unsignedBigInteger('user_id');                
                $table->unsignedBigInteger('inscription_id');            
                $table->string('value');
                $table->date('dateValue');
                $table->string('period');
                $table->date('dateExpiration');
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
        Schema::dropIfExists('abonoliquidacions');
    }
}
