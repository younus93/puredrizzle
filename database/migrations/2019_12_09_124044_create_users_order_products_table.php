<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_order_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("order_id");
            $table->unsignedBigInteger("product_id");
            $table->string('product_name',100);
            $table->float("product_price",10,2);
            $table->float("return_price",10,2);
            $table->unsignedTinyInteger("product_quantity");
            $table->unsignedTinyInteger("returned_quantity");
            $table->float("total_price",10,2);//(Product price*product_quantity - emptycanqty*emptycanprice)
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('order_id')->references('id')->on('users_order')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_order_products');
    }
}
