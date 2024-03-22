<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $table = "ekstrakurikulers";
    protected $primaryKey = "id";

    protected $fillable =[
        "nama", "logo", "deskripsi"
    ];

    public function images(): HasMany{
        return $this->hasMany(EkstrakurikulerImages::class, "ekstrakurikuler_id", "id");
    }
}
