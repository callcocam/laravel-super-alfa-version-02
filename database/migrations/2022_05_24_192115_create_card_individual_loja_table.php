<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardIndividualLojaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_individual_loja', function (Blueprint $table) {
            $table->foreignUuid('card_individual_id')->constrained('card_individuals')->onDelete('cascade');
            $table->foreignUuid('loja_id')->constrained('lojas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_individual_loja');
    }
}
