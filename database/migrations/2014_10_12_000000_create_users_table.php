<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('companyname')->nullable();
            $table->string('photo')->nullable();
            
            $table->integer('address_id')->nullable();

            $table->string('email')->unique();
            $table->string('password');

            $table->rememberToken();
            
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
        Schema::dropIfExists('users');
    }
}
