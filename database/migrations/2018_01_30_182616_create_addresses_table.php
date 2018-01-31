<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');

            $table->string('street');
            $table->string('locality');
            $table->string('region')->nullable();
            $table->string('landmark')->nullable();
            $table->string('city')->nullable();
            $table->string('district');
            $table->string('state');
            $table->string('pincode');
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('website')->nullable();

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
        Schema::dropIfExists('addresses');
    }
}
