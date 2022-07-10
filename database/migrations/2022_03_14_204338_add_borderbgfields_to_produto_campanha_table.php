<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBorderbgfieldsToProdutoCampanhaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos_campanhas', function (Blueprint $table) {
            $table->string('borda_produto_lamina')->default('não')->nullable();
            $table->string('cor_borda_produto_lamina')->nullable();
            $table->string('cor_fundo_produto_lamina')->nullable();
            $table->string('arredondamento_produto_lamina')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produto_campanha', function (Blueprint $table) {
            //
        });
    }
}
