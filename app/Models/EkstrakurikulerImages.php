<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EkstrakurikulerImages extends Model
{
    use HasFactory;

    protected $table = "ekstrakurikuler_images";
    protected $primaryKey = "id";

    public function images(): BelongsTo{
        return $this->belongsTo(Ekstrakurikuler::class, "ekstrakurikuler_id", "id");
    }
}
