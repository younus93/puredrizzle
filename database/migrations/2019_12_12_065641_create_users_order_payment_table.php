<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersOrderPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_order_payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("order_id");
            /*
             * Payment Types
             * 1: Online Payment
             * 2: Cash on Delivery
             */
            $table->unsignedTinyInteger("payment_type");

            /*
             * Payment Methods
             * 1=>Stripe
             * 2=>Paypal
             * 3=>Authorize
             * 4=>CC Avenue
             */
            $table->unsignedTinyInteger("payment_method");


            /*
             * Payment Status
            0=>Awaiting Payment or Not Completed
            1=>Payment Completed
            2=>Payment Failed
            3=>Payment Cancelled
            */
            $table->unsignedTinyInteger("payment_status");
            $table->string('payment_txnid',40)->nullable();
            $table->string('payment_response',1000)->nullable();
            $table->dateTime("paid_at")->nullable();
            /*
             * Payment Comments
             */
            $table->string("comments",1000)->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('users_order_payment');
    }
}
