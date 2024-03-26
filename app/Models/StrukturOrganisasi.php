<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $table = "struktur_organisasis";

    protected $primaryKey = "id";

    protected $fillable =[
        "kepsek", "wakil_kurikulum", "wakil_kesiswaan", "wakil_sarpras", "bk", "osis"
    ];
}
