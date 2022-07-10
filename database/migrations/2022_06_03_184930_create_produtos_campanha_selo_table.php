<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosCampanhaSeloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_campanha_selo', function (Blueprint $table) {
            $table->foreignUuid('produtos_campanha_id')->constrained('produtos_campanhas')->onDelete('cascade');
            $table->foreignUuid('selo_id')->constrained('selos')->onDelete('cascade');
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
        Schema::dropIfExists('produtos_campanha_selo');
    }
}
