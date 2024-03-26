<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GaleriImages extends Model
{
    use HasFactory;

    protected $table = "galeri_images";
    protected $primaryKey = "id";

    protected $fillable = [
        "image", "galeri_id"
    ];

    public function images(): BelongsTo{
        return $this->belongsTo(Galeri::class, "galeri_id", "id");
    }
}
