<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardIndividualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_individuals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('descricao_comercial', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('codigo_interno', 255)->nullable();
            $table->string('codigo_barras', 255)->nullable();
            $table->foreignUuid('produto_id')->nullable()->constrained('produtos');
            $table->string('descricao_auxiliar', 255)->nullable();
            $table->string('quantidade_parcelas', 255)->nullable();
            $table->string('tipo_embalagem', 50)->nullable();
            $table->string('qde_por_cx', 50)->nullable();
            $table->string('tipo_descricao', 50)->nullable();
            $table->integer('selo')->nullable();
            $table->integer('fracionado')->nullable();
            $table->integer('tabloide')->nullable();
            $table->string('preco_normal', 50)->nullable();
            $table->string('preco_promocional', 50)->nullable();
            $table->string('preco_desconto', 50)->nullable();
            $table->string('preco_caixa', 50)->nullable();
            $table->string('preco_app', 50)->nullable();
            $table->enum('app',['sim','não'])->nullable()->default('não');
            $table->string('template', 255)->nullable();
            $table->string('altura', 255)->nullable();
            $table->string('largura', 255)->nullable();
            $table->string('fundo', 255)->nullable();
            $table->string('cor_fundo_produto_lamina', 255)->nullable();
            $table->string('cor_borda_produto_lamina', 255)->nullable();
            $table->string('arredondamento_produto_lamina', 255)->nullable();
            $table->longtext('storie_image_proprietes')->nullable();
            $table->longtext('card_images_propriates')->nullable();
            $table->longtext('lamina_images_propriates')->nullable();
            $table->integer('order')->nullable();
            $table->enum('status',['draft','published'])->nullable()->comment("Situação do produto")->default('draft');
            $table->foreignUuid('user_id')->constrained('users')->nullable();
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
        Schema::dropIfExists('card_individuals');
    }
}
