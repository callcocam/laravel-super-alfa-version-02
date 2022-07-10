<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeFieldNullInCampanhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campanhas', function (Blueprint $table) {

            $table->integer('tamanho_borda_produto_lamina')->default(null)->nullable()->change();
            $table->integer('tamanho_arredondamento_produto_lamina')->default(null)->nullable()->change();
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
