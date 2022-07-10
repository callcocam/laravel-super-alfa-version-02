<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBgCartazTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_cartaz', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->nullable();
            $table->text('app_vertical')->nullable();
            $table->text('app_horizontal')->nullable();
            $table->text('promo_vertical')->nullable();
            $table->text('promo_horizontal')->nullable();
            $table->string('status')->nullable()->default('published');
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
        Schema::dropIfExists('bg_cartaz');
    }
}
