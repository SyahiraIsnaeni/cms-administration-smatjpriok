<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengumuman extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "pengumumans";

    protected $primaryKey = "id";

    protected $fillable =[
        "judul", "penulis", "slug", "konten", "kategori_pengumuman_id", "gambar", "dokumen", "is_active"
    ];

    protected $dates = ['deleted_at'];

    public function kategoriPengumuman(): BelongsTo{
        return $this->belongsTo(KategoriPengumuman::class, "kategori_pengumuman_id", "id");
    }
}
