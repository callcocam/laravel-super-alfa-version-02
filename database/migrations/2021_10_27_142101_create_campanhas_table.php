<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampanhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campanhas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome', 255)->comment("Nome da campanha");
            $table->string('slug', 255);
            $table->string('cover', 255)->nullable();
            $table->integer('quantidade')->nullable();
            $table->date('data_inicio')->nullable();
            $table->date('data_fim')->nullable();
            $table->enum('status',['draft','published', 'finished'])->nullable()->comment("Situação do produto")->default('draft');
            $table->foreignUuid('user_id')->constrained('users')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campanhas');
    }
}
