<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMidiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('midias', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->nullable();
            $table->string('bg_lamina_fim_de_semana', 255)->nullable();
            $table->string('bg_lamina_terca', 255)->nullable();
            $table->string('bg_lamina_terca_do_sabor', 255)->nullable();
            $table->string('bg_lamina_hortifruiti', 255)->nullable();
            $table->string('bg_lamina_ofertas_arrasadoras', 255)->nullable();
            $table->string('bg_card_promo', 255)->nullable();
            $table->string('bg_card_app', 255)->nullable();
            $table->string('bg_stories_promo', 255)->nullable();
            $table->string('bg_stories_app', 255)->nullable();
            $table->string('selo_mais_desconto', 255)->nullable();
            $table->string('bg_selo_horti', 255)->nullable();
            $table->string('bg_selo_segunda_e_terca', 255)->nullable();
            $table->string('bg_selo_terca_do_sabor', 255)->nullable();
            $table->string('bg_selo_fim_de_semana', 255)->nullable();
            $table->string('cor_segunda_e_terca', 255)->nullable();
            $table->string('cor_terca_do_sabor', 255)->nullable();
            $table->string('cor_lamina_hortifruti', 255)->nullable();
            $table->string('cor_lamina_ofertas_arrasadoras', 255)->nullable();
            $table->string('status')->nullable()->default('published');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('midias');
    }
}
