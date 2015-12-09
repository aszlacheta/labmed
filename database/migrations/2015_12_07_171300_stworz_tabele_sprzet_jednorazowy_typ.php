<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StworzTabeleSprzetJednorazowyTyp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprzet_jednorazowy_typ', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nazwa_sprzet_jedn_typ');

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
        Schema::drop('sprzet_jednorazowy_typ');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
