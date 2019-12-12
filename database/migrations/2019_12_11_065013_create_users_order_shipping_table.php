<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersOrderShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_order_shipping', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("order_id");
            $table->unsignedBigInteger("user_id");
            $table->string("remarks",1000);
            $table->unsignedTinyInteger("shipping_status")->default(0);
            /* SHIPPING STATUS INFO
             * 0=>Awaiting Order
             * 1=>Order Processing
             * 2=>Order Dispatched
             * 3=>Order Delivered
             * 4=>Order Returned
             */
            $table->unsignedTinyInteger("send_mail")->default(1);
            /* 0=>No Email to Customer, 1=>Send Email to Customer */

            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('users_order')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//Whom to Send Orders
            $table->unsignedBigInteger('created_by'); //Information added By Admin
            $table->foreign('created_by')->references('id')->on('users');//Admin or Moderator

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_order_shipping');
    }
}
