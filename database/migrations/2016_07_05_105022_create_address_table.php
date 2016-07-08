<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //  (Address1, Address2, Address3, City, State, Country, PostalCode)
          Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address1');
            $table->string('address2');
            $table->string('address3');
            $table->string('city')->index();
            $table->string('state');
            $table->string('country')->index();
            $table->string('postcode');
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
        Schema::drop('address');
    }
}
