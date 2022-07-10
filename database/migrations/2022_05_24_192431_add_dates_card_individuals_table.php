<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatesCardIndividualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('card_individuals', function (Blueprint $table) {            
            $table->date('data_inicio')->nullable();
            $table->date('data_fim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('card_individuals', function (Blueprint $table) {
            $table->dropColumn('data_inicio');
            $table->dropColumn('data_fim');
        });
    }
}
