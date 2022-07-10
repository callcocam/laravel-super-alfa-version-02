<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosCampanhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_campanhas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('descricao_comercial', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('codigo_interno', 255)->nullable();
            $table->string('codigo_barras', 255)->nullable();
            $table->foreignUuid('produto_id')->nullable()->constrained('produtos');
            $table->foreignUuid('coperat_id')->constrained('coperats');
            $table->string('descricao_auxiliar', 255)->nullable();
            $table->string('quantidade_parcelas', 255)->nullable();
            $table->string('tipo_embalagem', 50)->nullable();
            $table->string('preco_custo', 50)->nullable();
            $table->string('preco_normal', 50)->nullable();
            $table->string('preco_promocional', 50)->nullable();
            $table->string('preco_desconto', 50)->nullable();
            $table->string('preco_caixa', 50)->nullable();
            $table->string('preco_app', 50)->nullable();
            $table->enum('app',['sim','não'])->nullable()->default('não');
            $table->enum('status',['draft','published'])->nullable()->comment("Situação do produto")->default('draft');
            $table->foreignUuid('user_id')->constrained('users')->nullable();
            $table->foreignUuid('campanha_id')->constrained('campanhas')->nullable();
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
        Schema::dropIfExists('produtos_campanhas');
    }
}
