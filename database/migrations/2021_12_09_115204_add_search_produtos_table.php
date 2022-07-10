<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSearchProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            if (!Schema::hasColumn('produtos', 'search'))
                {
                    $table->text('search')->nullable();
                }           
        });
        //descricao_completa
        $produtos = \App\Models\Produto::query()->whereNull('search')->get();

        foreach($produtos as $produto){
            $description=[];
            $description[] =  $produto->cod_barras;
            $description[] =  $produto->descricao_completa;
            $description[] =  $produto->marketing->descricao_comercial;
            $description[] =  $produto->marketing->descricao_para_erp;
            $description[] =  $produto->marketing->descricao_para_encarte;
            $description[] =  $produto->compra->codigo_interno;
            $produto->search = implode(" ", $description);
            $produto->update();
        }
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
