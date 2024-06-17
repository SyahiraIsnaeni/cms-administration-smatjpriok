<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';

    protected $fillable = ['nama', 'kelas', 'telepon', 'jumlah', 'status', 'tanggal_dikembalikan', 'buku_id'];

    public function buku(): BelongsTo {
        return $this->belongsTo(Buku::class, "buku_id", "id");
    }
}
