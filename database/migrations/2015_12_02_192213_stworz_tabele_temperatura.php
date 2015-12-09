<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StworzTabeleTemperatura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temperatura', function (Blueprint $table) {
            $table->increments('id');
            $table->float('wartosc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('temperatura');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
