<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StworzTabeleSprzetJednorazowy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprzet_jednorazowy', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nazwa_sprzet_jedn');
            $table->integer('numer_kat');
            $table->integer('ilosc');
            $table->date('data_zakupu');
            $table->date('data_wymiany');
            $table->date('czas_gwarancji');
            $table->text('lokalizacja');
            $table->integer('sprzet_jedn_typ')->unsigned();
            $table->integer('sprzet_jedn_podtyp')->unsigned();
            $table->integer('asortyment')->unsigned();

            $table->foreign('sprzet_jedn_typ')->references('id')->on('sprzet_jednorazowy_typ');
            $table->foreign('sprzet_jedn_podtyp')->references('id')->on('sprzet_jednorazowy_podtyp');
            $table->foreign('asortyment')->references('id')->on('asortyment');
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
        Schema::drop('sprzet_jednorazowy');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
