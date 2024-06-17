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
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id()->nullable(false)->primary();
            $table->string("nama")->nullable(false);
            $table->string("kelas")->nullable(false);
            $table->string("telepon")->nullable(false);
            $table->integer("jumlah")->nullable(false);
            $table->boolean("status")->nullable(false)->default(0);
            $table->dateTime("tanggal_dikembalikan")->nullable("true");
            $table->unsignedBigInteger("buku_id")->nullable(false);
            $table->foreign("buku_id")->references("id")->on("bukus");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
