<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldEncarteImagePropriatesProdutosCampanhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos_campanhas', function (Blueprint $table) {            
            $table->longText('encarte_image_propriates')->nullable();
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
            $table->dropColumn('encarte_image_propriates');
        });
    }
}
