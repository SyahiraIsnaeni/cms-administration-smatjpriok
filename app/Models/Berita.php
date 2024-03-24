<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "beritas";

    protected $primaryKey = "id";

    protected $fillable =[
        "judul", "penulis", "slug", "konten", "kategori_pengumuman_id", "gambar", "is_active"
    ];

    protected $dates = ['deleted_at'];

    public function kategoriBerita(): BelongsTo{
        return $this->belongsTo(KategoriBerita::class, "kategori_berita_id", "id");
    }
}
