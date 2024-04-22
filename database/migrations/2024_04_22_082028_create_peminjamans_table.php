<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->string("nama")->nullable(false);
            $table->unsignedBigInteger('kelas_id')->nullable(false); 
            $table->string("judul_buku")->nullable(false);  
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->timestamps();

            $table->foreign("kelas_id")->references("id")->on("kelas");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamans');
    }
}
