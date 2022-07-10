<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsMidiasNesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('midias', function (Blueprint $table) {
            $table->string('cor_selo_ofertas_arrasadoras', 255)->nullable();
            $table->string('cor_selo_hortifruti', 255)->nullable();
            $table->string('cor_selo_terca_sabor', 255)->nullable();
            $table->string('cor_selo_segunda_terca', 255)->nullable();
            $table->string('cor_selo_fim_de_semana', 255)->nullable();
            $table->string('bg_selo_ofertas_arrasadoras', 255)->nullable();
            $table->string('bg_card_app_ofertas_arrasadoras', 255)->nullable();
            $table->string('bg_card_app_hortifruti', 255)->nullable();
            $table->string('bg_card_app_segunda_terca', 255)->nullable();
            $table->string('bg_card_promo_ofertas_arrasadoras', 255)->nullable();
            $table->string('bg_card_promo_hortifruti', 255)->nullable();
            $table->string('bg_card_promo_segunda_terca', 255)->nullable();
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
            $table->dropColumn('cor_selo_ofertas_arrasadoras');
            $table->dropColumn('cor_selo_hortifruti');
            $table->dropColumn('cor_selo_terca_sabor');
            $table->dropColumn('cor_selo_segunda_terca');
            $table->dropColumn('cor_selo_fim_de_semana');
            $table->dropColumn('bg_selo_ofertas_arrasadoras');
            $table->dropColumn('bg_card_app_ofertas_arrasadoras');
            $table->dropColumn('bg_card_app_hortifruti');
            $table->dropColumn('bg_card_app_segunda_terca');
            $table->dropColumn('bg_card_promo_ofertas_arrasadoras');
            $table->dropColumn('bg_card_promo_hortifruti');
            $table->dropColumn('bg_card_promo_segunda_terca');
        });
    }
}
