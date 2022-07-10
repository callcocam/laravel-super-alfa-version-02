<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_groups', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('card_individual_id')->constrained('card_individuals');
            $table->foreignUuid('produto_id')->constrained('produtos');
            $table->string("descricao", 255)->nullable();
            $table->string('type',50)->nullable()->default('parceiros');
            $table->enum('status',['draft','published'])->nullable()->comment("Situação do produto")->default('draft');
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
        Schema::dropIfExists('card_groups');
    }
}
