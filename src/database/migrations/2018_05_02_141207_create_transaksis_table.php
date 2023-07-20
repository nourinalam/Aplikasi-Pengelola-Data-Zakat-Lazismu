<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('muzakki_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('jeniszakat_id')->unsigned();
            $table->index(['muzakki_id','user_id','jeniszakat_id']);
            $table->integer('jiwa');
            $table->float('beras_fitrah',5,1)->nullable();
            $table->integer('uang_fitrah')->nullable();
            $table->integer('fidyah')->nullable();
            $table->integer('zakat_maal')->nullable();
            $table->integer('infaq')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('muzakki_id')->references('id')->on('muzakkis');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('jeniszakat_id')->references('id')->on('jenis_zakats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
