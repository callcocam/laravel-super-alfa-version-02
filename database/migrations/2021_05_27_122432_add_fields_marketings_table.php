<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsMarketingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marketings', function (Blueprint $table) {
            $table->string("descricao_para_erp")->nullable()->after('descriçao_comercial')->comment('Descrição para  ERP');
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
