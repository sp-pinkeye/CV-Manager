<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserAndAddressTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
			Schema::table('users', function ($table) {
				$table->dropForeign(['address_id']) ;
    			$table->dropColumn(['address_id']);
			});
			Schema::table('address', function ($table) {
   			$table->integer('user_id')->unsigned() ;
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::table('users', function ($table) {
    			$table->integer('address_id')->unsigned();
			});
			Schema::table('address', function ($table) {
    			$table->dropForeign(['user_id']) ;
    			$table->dropColumn(['user_id']);
			});
    }
}
