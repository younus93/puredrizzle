<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("shiplocations_id");
            $table->string('ship_address',1000)->nullable();
            $table->string('ship_latitude',40)->nullable();
            $table->string('ship_longitude',40)->nullable();
            $table->float("billed_amount",10,2);
            $table->float("paid_amount",10,2);
            $table->string('remarks',1000)->nullable();
            $table->unsignedTinyInteger("order_status"); //0:Processing, 1:Completed, 2:Declined
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shiplocations_id')->references('id')->on('users_location');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_order');
    }
}
