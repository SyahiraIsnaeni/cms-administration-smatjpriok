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
        Schema::create('galeri_images', function (Blueprint $table) {
            $table->id()->nullable(false)->primary();
            $table->string("image")->nullable(false);
            $table->unsignedBigInteger("galeri_id")->nullable(false);
            $table->foreign("galeri_id")->references("id")->on("galeris");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeri_images');
    }
};
