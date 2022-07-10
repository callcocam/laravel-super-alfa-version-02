<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldCampanhaIdGrupoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grupo_produtos', function (Blueprint $table) {
           $table->foreignUuid("campanha_id")->nullable()->constrained("campanhas")->after('produto_id');
            $table->foreignUuid("produtos_campanha_id")->nullable()->constrained("produtos_campanhas")->after('produto_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grupo_produtos', function (Blueprint $table) {
            //
        });
    }
}
