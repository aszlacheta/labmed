<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class StworzTabeleUrzadzenia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urzadzenia', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nazwa_urzadzenia');
            $table->integer('numer_kat');
            $table->date('data_zakupu');
            $table->date('data_wymiany_filtr');
            $table->date('czas_gwarancji');
            $table->text('lokalizacja');
            $table->integer('urzadzenia_typ_id')->unsigned();
            $table->integer('asortyment_id')->unsigned();

            $table->foreign('urzadzenia_typ_id')->references('id')->on('urzadzenia_typ');
            $table->foreign('asortyment_id')->references('id')->on('asortyment');
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
        Schema::drop('urzadzenia');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
