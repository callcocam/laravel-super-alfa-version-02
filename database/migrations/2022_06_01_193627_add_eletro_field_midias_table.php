<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEletroFieldMidiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('midias', function (Blueprint $table) {
            $table->string('bg_lamina_eletro', 255)->nullable();
            $table->string('bg_card_promo_eletro', 255)->nullable();
            $table->string('bg_card_app_eletro', 255)->nullable();
            $table->string('bg_stories_promo_eletro', 255)->nullable();
            $table->string('bg_stories_app_eletro', 255)->nullable();
            $table->string('cor_eletro', 255)->nullable();
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
            $table->dropColumn('bg_lamina_eletro');
            $table->dropColumn('bg_card_promo_eletro');
            $table->dropColumn('bg_card_app_eletro');
            $table->dropColumn('bg_card_app_eletro');
            $table->dropColumn('bg_stories_promo_eletro');
            $table->dropColumn('bg_stories_app_eletro');
            $table->dropColumn('cor_eletro');
        });
    }
}
