<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentToFamiliaProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('familia_produtos', function (Blueprint $table) {
            $table->string('parent',50)->nullable();
            $table->foreignUuid('produto_id')->nullable()->constrained('produtos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('familia_produto', function (Blueprint $table) {
            //
        });
    }
}
