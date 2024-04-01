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
        Schema::create('stafs', function (Blueprint $table) {
            $table->id()->nullable(false)->primary();
            $table->string("nama")->nullable(false);
            $table->string("nip")->unique()->nullable(false);
            $table->string("foto")->nullable(true);
            $table->string("jabatan")->nullable(false);
            $table->string("email")->nullable(true);
            $table->string("password")->nullable(true);
            $table->timestamps();
        });

        Schema::table('stafs', function (Blueprint $table) {
            $table->unique('email')->whereNotNull('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stafs');
    }
};
