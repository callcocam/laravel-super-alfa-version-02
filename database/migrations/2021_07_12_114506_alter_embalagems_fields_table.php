<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEmbalagemsFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('embalagems', function (Blueprint $table) {
            $table->string('qde_na_emb_secundaria',100)->change();
            $table->string('peso_bruto',100)->change();
            $table->string('peso_liquido',100)->change();
            $table->string('altura',100)->change();
            $table->string('largura',100)->change();
            $table->string('profundidade',100)->change();
            $table->string('qde_por_camada',100)->change();
            $table->string('empilhamento',100)->change();
            $table->string('qde_no_palete',100)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('embalagems', function (Blueprint $table) {
            //
        });
    }
}
