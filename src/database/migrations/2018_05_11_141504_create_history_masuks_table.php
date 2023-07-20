<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_masuks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip_address',15)->nullable();
            $table->string('OS',30)->nullable();
            $table->string('browser',120)->nullable();
            $table->integer('user_id')->unsigned();
            $table->index('user_id');
            $table->timestamps();

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
        Schema::dropIfExists('history_masuks');
    }
}
