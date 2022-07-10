<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampanhaCoperatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campanha_coperat', function (Blueprint $table) {
            $table->foreignUuid('campanha_id')->constrained('campanhas')->onDelete('cascade');
            $table->foreignUuid('coperat_id')->constrained('coperats')->onDelete('cascade');
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
        Schema::dropIfExists('campanha_coperat');
    }
}
