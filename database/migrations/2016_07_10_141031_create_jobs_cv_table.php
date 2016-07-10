<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	 	Schema::create('cvs_jobs', function (Blueprint $table) {
      	$table->integer('jobs_id')->unsigned();
      	$table->integer('cvs_id')->unsigned();
         $table->foreign('jobs_id')->references('id')->on('jobs');
         $table->foreign('cvs_id')->references('id')->on('cvs');
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
        Schema::drop('cvs_jobs');
    }
}
