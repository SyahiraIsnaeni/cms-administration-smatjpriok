<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';
    protected $fillable = ['peminjaman_id', 'nama', 'kelas_id', 'tanggal_pinjam', 'tanggal_kembali'];

    public function kelas() {
        return $this->belongsTo('App\Models\Kelas');
    }

 
}
