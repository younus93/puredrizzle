<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_category', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedTinyInteger("type");
            /*
             * 1=>Material
             * 2=>Flavour
             * 3=>Water Type
             */
            $table->string("name",50);
            $table->string("description",1000)->nullable();
            $table->unsignedTinyInteger("status")->default(1);
            /*
             * 0=>Inactive
             * 1=>Active
             */

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('products_category');
    }
}
