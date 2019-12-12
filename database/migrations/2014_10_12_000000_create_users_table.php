<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',45);
            $table->string('email',45)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email_token')->nullable();
            $table->string('password');
            $table->string('phone',40)->nullable();
            $table->string('profile_picture',100)->nullable();
            $table->unsignedTinyInteger("status"); //0:Pending,1:Active,2:Blocked
            $table->unsignedBigInteger("preferred_location_id")->nullable();
            $table->unsignedTinyInteger("role"); //1:Admin,2:Customer
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
