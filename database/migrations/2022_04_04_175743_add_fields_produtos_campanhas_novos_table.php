<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsProdutosCampanhasNovosTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos_campanhas', function (Blueprint $table) {
            $table->integer('selo')->nullable();
            $table->integer('fracionado')->nullable();
            $table->integer('tabloide')->nullable();
            $table->string('title_selo')->nullable();
            $table->string('subtitle_selo')->nullable();
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
            $table->dropColumn('selo');
            $table->dropColumn('fracionado');
            $table->dropColumn('tabloide');
            $table->dropColumn('title_selo');
            $table->dropColumn('subtitle_selo');
        });
    }
}
