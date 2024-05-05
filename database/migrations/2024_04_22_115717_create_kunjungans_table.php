<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKunjungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id')->nullable(true);
            $table->unsignedBigInteger('guru_id')->nullable(true);
            $table->date('tanggal');
            $table->timestamps();
            $table->foreign("siswa_id")->references("id")->on("siswas");
            $table->foreign("guru_id")->references("id")->on("gurus");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kunjungans');
    }
}
