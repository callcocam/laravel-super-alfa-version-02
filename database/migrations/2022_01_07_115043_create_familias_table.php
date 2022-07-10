<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familia_produtos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 255)->comment("Nome da loja");
            $table->string('slug', 255)->nullable();
            $table->text('description')->nullable();
            $table->enum('status',['draft','published', 'finished'])->nullable()->comment("Situação d familia")->default('draft');
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
        Schema::dropIfExists('familia_produtos');
    }
}
