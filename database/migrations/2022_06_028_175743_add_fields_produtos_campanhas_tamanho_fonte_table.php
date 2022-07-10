<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsProdutosCampanhasTamanhoFonteTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos_campanhas', function (Blueprint $table) {
            $table->string('tamanho_fonte_desc_lamina')->nullable();
            $table->string('altura_linha_desc_lamina')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos_campanhas', function (Blueprint $table) {
            $table->dropColumn('tamanho_fonte_desc_lamina');
            $table->dropColumn('altura_linha_desc_lamina');
        });
    }
}
