<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStoriesFieldsInMidiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('midias', function (Blueprint $table) {
//            $table->string('bg_stories_app_ofertas_arrasadoras', 255)->nullable();
//            $table->string('bg_stories_app_hortifruti', 255)->nullable();
//            $table->string('bg_stories_app_segunda_terca', 255)->nullable();
//            $table->string('bg_stories_promo_ofertas_arrasadoras', 255)->nullable();
//            $table->string('bg_stories_promo_hortifruti', 255)->nullable();
//            $table->string('bg_stories_promo_segunda_terca', 255)->nullable();
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
