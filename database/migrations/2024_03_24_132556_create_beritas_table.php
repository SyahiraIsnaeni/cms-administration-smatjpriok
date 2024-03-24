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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id()->nullable(false)->primary();
            $table->string("judul")->nullable(false);
            $table->string('penulis')->nullable(false)->default('Admin SMA Tanjung Priok');
            $table->string('slug')->nullable(false);
            $table->text('konten')->nullable(false);
            $table->unsignedBigInteger('kategori_berita_id')->nullable(false);
            $table->string('gambar')->nullable(false);
            $table->boolean('is_active');
            $table->softDeletes();
            $table->foreign("kategori_berita_id")->references("id")->on("kategori_beritas");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
