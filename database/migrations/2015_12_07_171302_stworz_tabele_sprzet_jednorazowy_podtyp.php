<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StworzTabeleSprzetJednorazowyPodtyp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprzet_jednorazowy_podtyp', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nazwa_sprzet_jedn_podtyp');
            $table->integer('sprzet_jedn_typ')->unsigned();

            $table->foreign('sprzet_jedn_typ')->references('id')->on('sprzet_jednorazowy_typ');
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
        Schema::drop('sprzet_jednorazowy_podtyp');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
