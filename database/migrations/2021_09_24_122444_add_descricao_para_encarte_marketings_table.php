<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescricaoParaEncarteMarketingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marketings', function (Blueprint $table) {
            $table->text('descricao_para_encarte')->after('atributo04')->nullable()->comment("Descrição para o encarte");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marketings', function (Blueprint $table) {
            //
        });
    }
}
