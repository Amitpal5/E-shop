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
            $table->string('day');
            $table->string('month');
            $table->string('year');
            $table->string('userid');
            $table->string('Payment_method');
            $table->string('subtotal');
            $table->string('order_id');
            $table->string('invoice');
            $table->string('number')->nullable();
            $table->string('bln_trt')->nullable();
            $table->string('status')->default(0);
            $table->string('return_order');
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
