<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $table = 'kunjungans';
    protected $fillable = ['kunjungan_id', 'nama', 'kelas_id', 'tanggal'];

    public function kelas() {
        return $this->belongsTo('App\Models\Kelas');
    }

 
}
