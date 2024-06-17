<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';
    protected $fillable = ['nama', 'kelas', 'judul_buku', 'status', 'tanggal_pinjam', 'tanggal_kembali'];

    public function kelas(): BelongsTo {
        return $this->belongsTo(Kelas::class, "kelas_id", "id");
    }
}
