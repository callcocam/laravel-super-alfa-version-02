<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEncartesMidiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('midias', function (Blueprint $table) {
            $table->string('bg_encarte_fim_de_semana', 255)->nullable();
            $table->string('bg_encarte_terca', 255)->nullable();
            $table->string('bg_encarte_terca_do_sabor', 255)->nullable();
            $table->string('bg_encarte_hortifruiti', 255)->nullable();
            $table->string('bg_encarte_ofertas_arrasadoras', 255)->nullable();
            $table->string('bg_encarte_extra', 255)->nullable();
            $table->string('bg_encarte_eletro', 255)->nullable();
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
            $table->dropColumn('bg_encarte_fim_de_semana');
            $table->dropColumn('bg_encarte_terca');
            $table->dropColumn('bg_encarte_terca_do_sabor');
            $table->dropColumn('bg_encarte_hortifruiti');
            $table->dropColumn('bg_encarte_ofertas_arrasadoras');
            $table->dropColumn('bg_encarte_extra');
            $table->dropColumn('bg_encarte_eletro');
        });
    }
}
