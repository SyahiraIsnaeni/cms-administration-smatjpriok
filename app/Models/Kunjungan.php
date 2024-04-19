<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $fillable = ['kunjungan_id', 'siswa_id', 'tanggal'];

    public function siswa() {
        return $this->belongsTo('App\Models\Siswa');
    }


}
