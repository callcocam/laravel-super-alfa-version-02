<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutosFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->string('peso_bruto_da_und', 100)->change();
            $table->string('peso_liquido_da_und', 100)->change();
            $table->string('preco_custo_un', 100)->change();
            $table->string('altura_da_und', 100)->change();
            $table->string('largura_da_und', 100)->change();
            $table->string('profundidade_da_und', 100)->change();
            $table->string('qde_por_cx')->change();

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
            //
        });
    }
}
