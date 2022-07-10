<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAndRenameFieldsInMidiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('midias', function (Blueprint $table) {
            $table->string('cor_fim_de_semana', 255)->nullable();
            $table->renameColumn('cor_lamina_hortifruti','cor_hortifruti');
            $table->renameColumn('cor_lamina_ofertas_arrasadoras','cor_ofertas_arrasadoras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('midias', function (Blueprint $table) {
            //
        });
    }
}
