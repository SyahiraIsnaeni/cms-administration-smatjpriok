<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('jadwals')) {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mapel_id');   
            $table->unsignedBigInteger('day_id');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();

            $table->foreign('mapel_id')->references('id')->on('mapels');
            $table->foreign('day_id')->references('id')->on('days');
        });
     }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
}
