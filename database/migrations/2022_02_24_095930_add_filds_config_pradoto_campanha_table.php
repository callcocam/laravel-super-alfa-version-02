<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFildsConfigPradotoCampanhaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos_campanhas', function (Blueprint $table) {
            $table->string('template')->default('cima')->nullable();
            $table->string('altura')->nullable();
            $table->string('largura')->nullable();
            $table->string('fundo')->nullable();
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
            $table->dropColumn('template');
            $table->dropColumn('altura');
            $table->dropColumn('largura');
            $table->dropColumn('fundo');
        });
    }
}
