<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('liquidacion_id');
            $table->string('transfer_id');
            $table->string('amount');
            $table->string('authorization');
            $table->string('method');
            $table->string('operation_type');
            $table->string('transaction_type');
            $table->string('pay_type');
            $table->string('pay_brand');
            $table->string('pay_holder_name');
            $table->boolean('pay_allows_charges');
            $table->boolean('pay_allows_payouts');
            $table->string('pay_bank_name');
            $table->string('status');
            $table->string('currency')->nullable();
            $table->dateTime('creation_date');
            $table->dateTime('operation_date');
            $table->string('description');
            $table->string('error_message')->nullable();
            $table->string('order_id');
            $table->string('exchange_rate_from')->nullable();
            $table->string('exchange_rate_date')->nullable();
            $table->string('exchange_rate_value')->nullable();
            $table->string('exchange_rate_to')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('pagos');
    }

}
