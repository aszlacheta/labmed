<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class StworzTabeleMaterialBiologiczny extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_biologiczny', function (Blueprint $table) {
            $table->increments('id');
            $table->text('rodzaj_komorek');
            $table->text('rodzaj_tkanki');
            $table->text('nazwa');
            $table->date('data_zamrozenia');
            $table->integer('temperatura_przechowywania');
            $table->text('sposob_utrwalenia');
            $table->text('obserwacje');
            $table->text('rodzaj_probowki');
            $table->integer('stezenie');
            $table->integer('objetosc_probki');
            $table->date('data_gwarancji');
            $table->text('lokalizacja');
            $table->integer('fk_asortyment')->unsigned();
            $table->integer('fk_typ')->unsigned();

            $table->foreign('fk_asortyment')->references('id')->on('asortyment');
            $table->foreign('fk_typ')->references('id')->on('material_biologiczny_typ');
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
        Schema::drop('material_biologiczny');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
