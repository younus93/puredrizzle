<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("product_id");
            $table->float("price",10,2);
            $table->float("return_price",10,2)->nullable();
            $table->unsignedTinyInteger("discount_type")->nullable(); //Flat Price or Percentage
            $table->float("discount",10,2)->nullable();
            $table->float("tax",10,2)->default(0); //Percentage
            //$table->unsignedSmallInteger("product_stock")->default(0);
            //$table->unsignedSmallInteger("sold_count")->default(0);

            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_history');
    }
}
