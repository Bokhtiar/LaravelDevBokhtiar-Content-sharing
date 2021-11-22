<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->string('country');
            $table->string('phone')->nullable();
            $table->integer('qty');
            $table->string('payment_id');

            $table->string('USDT_Wallet')->nullable();
            $table->string('Payoneer')->nullable();
            $table->string('Perfect_Money_Usd')->nullable();
            $table->string('Webmoney')->nullable();
            $table->string('BTC_WALLET')->nullable();

            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
