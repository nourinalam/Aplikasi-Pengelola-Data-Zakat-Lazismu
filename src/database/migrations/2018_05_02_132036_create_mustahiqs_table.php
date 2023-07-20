<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMustahiqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mustahiqs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('area');
            $table->integer('jenismustahiq_id')->unsigned();
            $table->index('jenismustahiq_id');
            $table->timestamps();

            $table->foreign('jenismustahiq_id')->references('id')->on('jenis_mustahiqs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mustahiqs');
    }
}
