<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = "fasilitas";

    protected $primaryKey = "id";

    protected $fillable =[
        "nama", "gambar"
    ];
}
