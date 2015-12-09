<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StworzTabeleOdczynnikTyp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odczynnik_typ', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nazwa');
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
        Schema::drop('odczynnik_typ');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
