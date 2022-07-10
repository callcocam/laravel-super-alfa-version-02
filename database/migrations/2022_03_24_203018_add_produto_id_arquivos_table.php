<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProdutoIdArquivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('arquivos', function (Blueprint $table) {
            $table->string('produto_id')->nullable();
            $table->integer('atualizado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('arquivos', function (Blueprint $table) {
            $table->dropForeign('produtos_produto_id_foreign');
            $table->dropColumn('produto_id');
            $table->dropColumn('atualizado');
        });
    }
}
