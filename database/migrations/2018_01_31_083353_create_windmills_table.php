<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWindmillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('windmills', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id');
            $table->string('manufacturer');
            $table->string('modelno')->nullable();
            $table->double('ratedpower', 8, 2)->nullable();
            $table->double('ratedwindspeed', 8, 2)->nullable();
            $table->double('ratedrpm', 8, 2)->nullable();
            $table->double('rotordiameter', 8, 2)->nullable();

            $table->integer('address_id')->nullable();

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
        Schema::dropIfExists('windmills');
    }
}
