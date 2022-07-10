<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTransparentArquivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('arquivos', function (Blueprint $table) {
            $table->string('transparent')->after('type')->nullable()->default('0')->comment("1 para sim e 0 para não é tranparente");
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
            //
        });
    }
}
