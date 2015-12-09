<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StworzTabeleUrzadzeniaTyp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urzadzenia_typ', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nazwa');
            $table->text('nadgrupa');
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
        Schema::drop('urzadzenia_typ');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
