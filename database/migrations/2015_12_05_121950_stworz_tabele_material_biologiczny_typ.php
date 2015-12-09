<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StworzTabeleMaterialBiologicznyTyp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_biologiczny_typ', function (Blueprint $table) {
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
        Schema::drop('material_biologiczny_typ');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
