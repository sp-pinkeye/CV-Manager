<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('address', function ($table) {
            $table->integer('education_id')->unsigned()->nullable()->after('user_id') ;
            $table->foreign('education_id')->references('id')->on('education');
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
        Schema::table('address', function ($table) {
            $table->dropForeign(['education_id']) ;
            $table->dropColumn(['education_id']);
        });
    }
}
