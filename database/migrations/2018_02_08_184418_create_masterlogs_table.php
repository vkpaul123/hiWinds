<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masterlogs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('windmill_id');

            // $table->double('current', 8, 4);
            $table->double('voltage', 8, 4);
            $table->double('power', 8,4);
            $table->double('humidity', 8, 4);
            $table->double('temperature', 8, 4);
            
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
        Schema::dropIfExists('masterlogs');
    }
}
