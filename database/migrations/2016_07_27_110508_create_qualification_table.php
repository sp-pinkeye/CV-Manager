<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('qualification', function (Blueprint $table) {
            $table->increments('id');
            $table->string('level');
            $table->string('subject') ;
            $table->string('grade') ;
            $table->integer( 'user_id')->unsigned() ;
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer( 'education_id')->unsigned() ;
            $table->foreign('education_id')->references('id')->on('education');
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
        Schema::drop('qualification');
    }
}
