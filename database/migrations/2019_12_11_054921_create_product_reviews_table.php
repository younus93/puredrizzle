<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("user_id");
            $table->float("star_rating",10,2)->default("0");
            $table->unsignedTinyInteger("favourite")->default("0");
            $table->string("user_review",1000)->nullable();
            $table->dateTime("user_reviewed_at")->nullable();
            $table->unsignedTinyInteger("review_approved_status")->default("0");
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_reviews');
    }
}
