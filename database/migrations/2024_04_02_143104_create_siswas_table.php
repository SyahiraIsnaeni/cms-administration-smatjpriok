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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id()->nullable(false)->primary();
            $table->string("nama")->nullable(false);
            $table->string("nis")->unique()->nullable(false);
            $table->enum("jenis_kelamin", ['laki-laki', 'perempuan'])->nullable(false);
            $table->string("email")->nullable(true);
            $table->string("password")->nullable(true);
            $table->unsignedBigInteger('kelas_id')->nullable(false);
            $table->foreign("kelas_id")->references("id")->on("kelas");
            $table->timestamps();
        });

        Schema::table('siswas', function (Blueprint $table) {
            $table->unique('email')->whereNotNull('email');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
