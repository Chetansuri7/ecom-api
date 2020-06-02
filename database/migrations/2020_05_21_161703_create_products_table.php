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
            $table->bigIncrements('id');
            $table->string('sku');
            $table->string('name');
            $table->double('list_price');
            $table->double('sale_price');
            $table->double('discount');
            $table->double('tax');
            $table->string('photo');
            $table->string('product_description');
            $table->string('warranty');
            $table->string('merchandising_keyword');
            $table->boolean('is_hot_product');
            $table->boolean('is_new_arrival');
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
