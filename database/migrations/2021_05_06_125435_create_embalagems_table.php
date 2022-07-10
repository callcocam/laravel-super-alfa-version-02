<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmbalagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('embalagems', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('tem_embalagem_secundaria', ['sim', 'não'])->default('não')->nullable();
            $table->string('dun_14')->nullable()->comment("DUN 14  (ou EAN quando Embalagem em CX/FDO/Display) * Números");
            $table->integer('qde_na_emb_secundaria')->nullable()->comment("Qde na emb. Secundária (cx/fdo/display) * Números ");
            $table->integer('peso_bruto')->nullable()->comment("Peso Bruto CX.fdo... (em grama)");
            $table->integer('peso_liquido')->nullable()->comment("Peso Liquido cx/fdo. (em grama) * Números");
            $table->integer('altura')->nullable()->comment("Altura cx/fdo... (em cm) * Números");
            $table->integer('largura')->nullable()->comment("Largura cx / fdo ... (em cm) * Números");
            $table->integer('profundidade')->nullable()->comment("Profundidade cx/fdo ... (em cm) * Números");
            $table->integer('qde_por_camada')->nullable()->comment("Qde por Camada (em cx/fdo,etc) Números");
            $table->integer('empilhamento')->nullable()->comment("Empilhamento (em cx/fdo,etc) Números");
            $table->integer('qde_no_palete')->nullable()->comment("Qde no palete (em cx/fdos,etc)");
            $table->foreignUuid('produto_id')->constrained('produtos')->cascadeOnDelete()->nullable();
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
        Schema::dropIfExists('embalagems');
    }
}
