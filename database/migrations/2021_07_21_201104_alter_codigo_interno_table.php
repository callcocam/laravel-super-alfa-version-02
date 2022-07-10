<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCodigoInternoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compras', function (Blueprint $table) {
            $table->string('codigo_interno')->change();
            $table->string('margem_do_produto',100)->change();
            $table->string('quantidade_minima_de_tranf',100)->change();
            $table->string('n_do_deposito_cd',100)->change();
            $table->string('inclusao_na_linha_ou_substituicao_de_produto',100)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compras', function (Blueprint $table) {
            //
        });
    }
}
