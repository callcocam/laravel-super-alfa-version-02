<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('descricao_completa')->comment("Descrição Completa");
            $table->string('cod_prod_fornecedor')->comment("Cod.Prod.do Fornecedor: * Numeros");
            $table->string('slug');
            $table->string('medida_id',36)->nullable();
            $table->string('medida_name',255)->nullable();
            $table->text('outras_especificacoes')->nullable()->comment("Outras especificações: Letras e Numeros");
            $table->string('categoria_produto')->nullable()->comment("Categoria Produto");
            $table->string('subcategoria')->nullable()->comment("Subcategoria");
            $table->string('segmento')->nullable()->comment("Segmento");
            $table->string('subsegmento')->nullable()->comment("Subsegmento");
            $table->string('marca')->nullable()->comment("Marca");
            $table->string('cor')->nullable()->comment("Cor Letras");
            $table->string('fragrancia')->nullable()->comment("Fragrância");
            $table->string('sabor')->nullable()->comment("Sabor");
            $table->string('modelo')->nullable()->comment("Modelo Letras e Números ");
            $table->string('imagem')->nullable()->comment("(enviar arquivo digital) Formato PNG tamanho 3000x3000 300dpi");
            $table->string('thumb')->nullable();
            $table->string('tamanho')->nullable()->comment("Tamanho: Letras e Numeros");
            $table->string('mva_interno')->nullable()->comment("% MVA Interno: Letras e Numeros");
            $table->string('mva_ajustado')->nullable()->comment("% MVA Ajustado: Letras e Numeros");
            $table->string('tipo_de_frete')->nullable()->comment("Tipo de Frete (FOB/CIF): Letras e Numeros");
            $table->string('classif_fiscal_ncm')->nullable()->comment("Classif. Fiscal NCM: *  Letras e Numeros");
            $table->string('cod_barras')->nullable()->comment("Cód. Barras EAN-13 * Números");
            $table->integer('prazo_de_validade')->nullable()->comment("Prazo de Validade (em dias): * Números");
            $table->string('peso_bruto_da_und')->nullable()->comment("Peso Bruto da UND (em Grama): * Letras e Números");
            $table->string('peso_liquido_da_und')->nullable()->comment("Peso Líquido da UND (em Grama): * Letras e Números");
            $table->decimal('preco_custo_un', 9,4)->nullable()->comment("Preço Custo UN: Números");
            $table->decimal('altura_da_und', 9,4)->nullable()->comment("Altura da UND (em cm): Números");
            $table->decimal('largura_da_und', 9,4)->nullable()->comment("Largura da UND (em cm): Números");
            $table->decimal('profundidade_da_und', 9,4)->nullable()->comment("Profundidade da UND (em cm): Números");
            $table->integer('qde_por_cx')->nullable()->comment("Qde por Cx/Fdo/etc * Números");
            $table->enum('status',['criado','arquivar','compras','marketings','cadastro','estoque','recusado','finalizado','concluido'])->nullable()->comment("Situação do produto")->default('criado');
           // $table->foreignUuid('sabor_id')->constrained('sabors')->nullable();
//            $table->foreignUuid('fragancia_id')->constrained('fragrancias')->nullable();
//            $table->foreignUuid('segmento_id')->constrained('segmentos')->nullable();
//            $table->foreignUuid('marca_id')->constrained('marcas')->nullable();
//            $table->foreignUuid('categoria_id')->constrained('categorias')->nullable();
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
        Schema::dropIfExists('produtos');
    }
}
