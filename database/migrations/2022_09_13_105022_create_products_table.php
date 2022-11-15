<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('catagoryid');
            $table->string('subcatagoryid');
            $table->string('brandid')->nullable();
            $table->string('productname');
            $table->string('product_code');
            $table->string('productsize')->nullable();
            $table->string('product_colour')->nullable();
            $table->string('qty');
            $table->string('price');
            $table->string('discountprice')->nullable();
            $table->string('productimage');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('shortd')->nullable();
            $table->string('longd')->nullable();
            $table->string('bestseller')->nullable();
            $table->string('hot_deal')->nullable();
            $table->string('sales')->nullable();
            $table->string('lproduct')->nullable();
            $table->string('bweek')->nullable();
            $table->string('popular')->nullable();

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
        Schema::dropIfExists('products');
    }
}
