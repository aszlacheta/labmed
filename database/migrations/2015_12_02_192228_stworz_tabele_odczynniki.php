<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class StworzTabeleOdczynniki extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odczynniki', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nazwa');
            $table->text('firma');
            $table->text('numer_kat');
            $table->integer('ilosc');
            $table->text('jednostka');
            $table->integer('masa_molowa');
            $table->date('data_waznosci');
            $table->integer('cena_za_szt');
            $table->dateTime('data_dodania');
            $table->text('lokalizacja');
            $table->integer('odczynnik_typ_fk')->unsigned();
            $table->integer('temperatura_fk')->unsigned();
            $table->integer('asortyment_fk')->unsigned();

            $table->foreign('odczynnik_typ_fk')->references('id')->on('odczynnik_typ');
            $table->foreign('temperatura_fk')->references('id')->on('temperatura');
            $table->foreign('asortyment_fk')->references('id')->on('asortyment');
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
        Schema::drop('odczynniki');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
