<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampnhasImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campanhas', function (Blueprint $table) {
            $table->text('bg_lamina')->after('data_fim')->nullable();
            $table->text('bg_card')->after('bg_lamina')->nullable();
            $table->text('bg_stories')->after('bg_card')->nullable();
            $table->text('bg_encarte')->after('bg_stories')->nullable();
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
           
            $table->dropColumn('bg_lamina');
            $table->dropColumn('bg_card');
            $table->dropColumn('bg_stories');
            $table->dropColumn('bg_encarte');
        });
    }
}
