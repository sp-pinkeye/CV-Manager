<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
			Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->unsigned(); // Or could order by start/end date
            $table->string('company', 128);
            $table->mediumText('summary');
            $table->text('description');
            $table->datetime('start');
            $table->datetime('end');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->integer('cvs_id')->unsigned()->nullable();
            $table->foreign('cvs_id')->references('id')->on('cvs');
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
        Schema::drop('jobs');
    }
}
