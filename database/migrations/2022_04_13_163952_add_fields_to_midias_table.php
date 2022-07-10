<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToMidiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('midias', function (Blueprint $table) {
            $table->string('bg_lamina_extra', 255)->nullable();
            $table->string('bg_card_promo_lamina_extra', 255)->nullable();
            $table->string('bg_card_app_lamina_extra', 255)->nullable();
            $table->string('bg_stories_promo_lamina_extra', 255)->nullable();
            $table->string('bg_stories_app_lamina_extra', 255)->nullable();
            $table->string('bg_selo_lamina_extra', 255)->nullable();
            $table->string('cor_lamina_extra', 255)->nullable();
            $table->string('cor_selo_lamina_extra', 255)->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('midias', function (Blueprint $table) {
            //
        });
    }
}
