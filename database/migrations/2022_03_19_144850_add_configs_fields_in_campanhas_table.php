<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConfigsFieldsInCampanhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campanhas', function (Blueprint $table) {
            $table->string('exibir_borda_produto_lamina')->default('sim')->nullable();
            $table->integer('tamanho_borda_produto_lamina')->default('2')->nullable();
            $table->integer('tamanho_arredondamento_produto_lamina')->default('10')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campanhas', function (Blueprint $table) {
            //
        });
    }
}
