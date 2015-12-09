<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StworzTabeleAsortyment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asortyment', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nazwa');
            $table->text('opis');
            $table->text('lokalizacja');
//            $table->timestamps();
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
        Schema::drop('asortyment');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
