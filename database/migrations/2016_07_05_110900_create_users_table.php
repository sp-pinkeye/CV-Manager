<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('firstname', 32)->nullable();
            $table->string('lastname', 32)->nullable();
            $table->string('name', 32);
            $table->string('telephone', 20)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('email')->unique();
            $table->string('password', 255);
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('address');
            $table->rememberToken()->nullable();
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
        Schema::drop('users');
    }
}
