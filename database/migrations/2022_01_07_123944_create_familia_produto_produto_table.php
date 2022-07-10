<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliaProdutoProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familia_produto_produto', function (Blueprint $table) {
            $table->foreignUuid('familia_produto_id')->constrained('familia_produtos')->onDelete('cascade');
            $table->foreignUuid('produto_id')->constrained('produtos')->onDelete('cascade');
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
        Schema::dropIfExists('familia_produto_produto');
    }
}
