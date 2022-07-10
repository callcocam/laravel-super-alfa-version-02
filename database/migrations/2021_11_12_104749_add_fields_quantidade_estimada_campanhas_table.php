<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsQuantidadeEstimadaCampanhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campanhas', function (Blueprint $table) {
            $table->integer("quantidade_estimada")->nullable()->default("80")->after('quantidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('capmpanhas', function (Blueprint $table) {
            //
        });
    }
}
