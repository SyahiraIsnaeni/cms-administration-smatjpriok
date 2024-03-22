<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ekstrakurikuler_images', function (Blueprint $table) {
            $table->id()->nullable(false)->primary();
            $table->string("image")->nullable(false);
            $table->unsignedBigInteger("ekstrakurikuler_id")->nullable(false);
            $table->foreign("ekstrakurikuler_id")->references("id")->on("ekstrakurikulers");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekstrakurikuler_images');
    }
};
