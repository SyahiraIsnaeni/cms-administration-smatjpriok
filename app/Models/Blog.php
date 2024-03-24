<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "blogs";

    protected $primaryKey = "id";

    protected $fillable =[
        "judul", "penulis", "slug", "konten", "gambar", "is_active"
    ];

    protected $dates = ['deleted_at'];
}
