<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEcommerceProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->string('maximo_de_unidade_por_compra', 255)->nullable();
            $table->string('quantidade_minima_para_compra', 255)->nullable();
            $table->string('quantidade_fixa_de_estoque', 255)->nullable();
            $table->string('fracao_da_unidade_de_venda', 255)->nullable();
            $table->string('percentual_sobre_estoque', 255)->nullable();
            $table->string('estoque_mínimo_para_loja_fisica', 255)->nullable();
            $table->integer('integrar_estoque_com_quantidade_fixa')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('maximo_de_unidade_por_compra');
            $table->dropColumn('quantidade_minima_para_compra');
            $table->dropColumn('quantidade_fixa_de_estoque');
            $table->dropColumn('fracao_da_unidade_de_venda');
            $table->dropColumn('percentual_sobre_estoque');
            $table->dropColumn('estoque_mínimo_para_loja_fisica');
            $table->dropColumn('integrar_estoque_com_quantidade_fixa');
        });
    }
}
