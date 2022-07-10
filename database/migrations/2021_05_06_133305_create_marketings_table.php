<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('descriçao_comercial')->nullable()->comment("Descrição comercial: * Letras e Números");
            $table->string('conta_nivel01')->nullable()->comment("Conta Nivel 1: Letras");
            $table->string('conta_nivel02')->nullable()->comment("Conta Nivel 2: Letras");
            $table->string('conta_nivel03')->nullable()->comment("Conta Nivel 3: Letras");
            $table->string('conta_nivel04')->nullable()->comment("Conta Nivel 4: Letras");
            $table->string('atributo01')->nullable()->comment("Atributo 1: Letras e Números");
            $table->string('atributo02')->nullable()->comment("Atributo 2: Letras e Números");
            $table->string('atributo03')->nullable()->comment("Atributo 3: Letras e Números");
            $table->string('atributo04')->nullable()->comment("Atributo 4: Letras e Números");
            $table->foreignUuid('produto_id')->constrained('produtos')->nullable();
            $table->foreignUuid('user_id')->constrained('users')->nullable();
            $table->enum('status',['criado','arquivar','compras','marketings','cadastro','recusado','finalizado','concluido'])->nullable()->comment("Situação do produto")->default('criado');
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
        Schema::dropIfExists('marketings');
    }
}
