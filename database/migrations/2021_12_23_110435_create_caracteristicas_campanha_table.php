<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristicasCampanhaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campanhas', function (Blueprint $table) {
            $table->text('selo_mais_desconto')->after('bg_lamina')->nullable();
            $table->string('cor_fonte_promo')->after('selo_mais_desconto')->nullable();
            $table->string('cor_fonte_app')->after('cor_fonte_promo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campanhas', function (Blueprint $table) {
            $table->dropColumn('selo_mais_desconto');
            $table->dropColumn('cor_fonte_promo');
            $table->dropColumn('cor_fonte_app');
        });
    }
}
