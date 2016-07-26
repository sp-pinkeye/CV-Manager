<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('cvs_jobs', function ($table) {
            $table->boolean('featured')->default(false)->index() ;
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
        Schema::table('cvs_jobs', function ($table) {
            $table->dropIndex(['featured']);
            $table->dropColumn(['featured']);
        });
    }
}
