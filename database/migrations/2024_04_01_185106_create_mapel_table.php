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
        Schema::create('mapel', function (Blueprint $table) {
            $table->id()->nullable(false)->primary();
            $table->string("nama")->nullable(false);
            $table->unsignedBigInteger('kelas_id')->nullable(false);
            $table->unsignedBigInteger('guru_id')->nullable(false);
            $table->foreign("kelas_id")->references("id")->on("kelas");
            $table->foreign("guru_id")->references("id")->on("gurus");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapel');
    }
};
