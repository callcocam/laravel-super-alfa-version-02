<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('codigo_interno')->nullable()->comment("Código Interno Alfa: Números");
            $table->string('conta_de_estoque_cooperate')->nullable()->comment("Conta de estoque Cooperate: Letras e Números");
            $table->integer('margem_do_produto')->nullable()->comment("Margem do Produto: Números");
            $table->integer('quantidade_minima_de_tranf')->nullable()->comment("Quantidade Mínima de Tranf.: Números");
            $table->integer('n_do_deposito_cd')->nullable()->comment("Nº do Depósito do CD: Números");
            $table->string('entrega_cd_ou_na_filial')->nullable()->comment("Conta Nivel 4: Letras");
            $table->string('item_e_c_d')->nullable()->comment("Entrega CD ou na Filial Letras");
            $table->integer('inclusao_na_linha_ou_substituicao_de_produto')->nullable()->comment("Inclusão na Linha ou Substituição de Produto");
            $table->string('codigo_do_produto_a_ser_substituído')->nullable();
            $table->foreignUuid('produto_id')->constrained('produtos')->nullable();
            $table->foreignUuid('user_id')->constrained('users')->nullable();
            $table->enum('status',['criado','arquivar','compras','marketings','cadastro','estoque','recusado','finalizado','concluido'])->nullable()->comment("Situação do produto")->default('criado');
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
        Schema::dropIfExists('compras');
    }
}
