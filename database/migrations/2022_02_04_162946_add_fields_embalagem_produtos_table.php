<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsEmbalagemProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->string('tipo_de_embalagem_secundaria')->nullable();
            $table->string('volume_de_embalagem_secundaria')->nullable();
            $table->foreignUuid('medida_embalagem_secundaria_id')->nullable()->constrained('medidas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('tipo_de_embalagem_secundaria');
            $table->dropColumn('volume_de_embalagem_secundaria');
            $table->dropForeign('produtos_medida_embalagem_secundaria_id_foreign');
            $table->dropColumn('medida_embalagem_secundaria_id');
        });
    }
}
