<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('education', function (Blueprint $table) {
            $table->increments('id');
            $table->string('establishment');
            $table->date('start');
            $table->date('end');
            $table->integer( 'address_id')->unsigned()->nullable() ;
            $table->foreign('address_id')->references('id')->on('address');
            $table->integer( 'user_id')->unsigned() ;
            $table->foreign('user_id')->references('id')->on('users');
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
        //
        Schema::drop('education');

    }
}
