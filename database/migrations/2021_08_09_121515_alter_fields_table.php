<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
           // $table->string('modelo_tipo_referencia')->after('marca');
            $table->string('fragrancia_sabor')->after('marca');
            $table->renameColumn('segmento','tipo_de_embalagem');
            $table->renameColumn('subsegmento','volume_de_embalagem')->after('tipo_de_embalagem');
        });
        Schema::table('produtos', function (Blueprint $table) {
            // $table->string('modelo_tipo_referencia')->after('marca');
             $table->string('segmento')->after('marca');
            $table->string('subsegmento')->after('marca');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
