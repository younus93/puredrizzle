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
            $table->string('name',100);
            $table->string('slug',50)->nullable();
            $table->string('product_sku')->nullable();
            $table->string('product_description_short',1000)->nullable();
            $table->string('product_description',1000)->nullable();
            $table->string('product_categories',200)->nullable(); //Comma Seperated Category Values
            $table->unsignedBigInteger("brand_id");
            $table->float("average_rating",10,2)->default(0); // Sum of product rating/Total Rating of Same Product
            /*
             * 1 - Active
             * 0 - Inactive
             *
             * */
            $table->unsignedTinyInteger("status");
            $table->unsignedBigInteger('created_by'); //Admin ID Or Name
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('brand_id')->references('id')->on('brands');

            //$table->foreign('product_categories')->references('id')->on('products'); //Multi Seperated Category ID
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
