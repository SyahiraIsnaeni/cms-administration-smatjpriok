<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $table = "kategori_beritas";

    protected $primaryKey = "id";

    protected $fillable =[
        "kategori", "slug"
    ];

    public function beritas(): HasMany{
        return $this->hasMany(Berita::class, "kategori_berita_id", "id");
    }
}
