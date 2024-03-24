<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = "pengumumans";

    protected $primaryKey = "id";

    protected $fillable =[
        "judul", "penulis", "slug", "konten", "kategori_pengumuman_id", "gambar", "dokumen", "is_active"
    ];
}
