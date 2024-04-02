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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id()->nullable(false)->primary();
            $table->string("nama_kelas")->nullable(false);
            $table->timestamps();
        });

        Schema::table('kelas', function (Blueprint $table) {
            $table->unique('nama_kelas')->whereNotNull('nama_kelas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
