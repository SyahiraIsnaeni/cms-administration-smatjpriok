<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Galeri extends Model
{
    use HasFactory;

    protected $table = "galeris";

    protected $primaryKey = "id";

    protected $fillable =[
        "judul", "thumbnail"
    ];

    public function images(): HasMany{
        return $this->hasMany(GaleriImages::class, "galeri_id", "id");
    }
}
