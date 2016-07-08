<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('skill_list', function (Blueprint $table) {
            $table->increments('id');
  				$table->string('name',64 ) ;
  				$table->string('version', 64 )->nullable() ;         
  				$table->integer('experience')->unsigned()->nullable() ;
            $table->integer('user_id')->unsigned();
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
       Schema::drop('skill_list');
    }
}
