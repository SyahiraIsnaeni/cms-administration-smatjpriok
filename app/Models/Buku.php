<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';

    protected $fillable = ['judul', 'penerbit', 'jumlah'];

    public function peminjaman(): HasMany {
        return $this->hasMany(Peminjaman::class, "buku_id", "id");
    }
}
