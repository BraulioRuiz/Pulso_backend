<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CardiacControl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardiac_control', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_user');            
            $table->unsignedInteger('id_pulse');
            $table->foreign('id_pulse')->references('id')->on('heartbeat')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('cardiac_control');
    }
}
