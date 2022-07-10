<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClustersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clusters', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome', 255)->comment("Nome da clusters");
            $table->string('slug', 255)->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('clusters');
    }
}
