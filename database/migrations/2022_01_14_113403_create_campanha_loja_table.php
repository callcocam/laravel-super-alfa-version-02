<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampanhaLojaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campanha_loja', function (Blueprint $table) {
            $table->foreignUuid('campanha_id')->constrained('campanhas')->onDelete('cascade');
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
        Schema::dropIfExists('campanha_loja');
    }
}
