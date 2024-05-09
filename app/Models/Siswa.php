<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Model
{
    use HasFactory;

    protected $table = "siswas";

    protected $primaryKey = "id";

    protected $fillable = ['nama', "nis", "jenis_kelamin", "email", "password", "kelas_id"];

    public function kelas(): BelongsTo{
        return $this->belongsTo(Kelas::class, "kelas_id", "id");
    }

    public function kunjungan():HasMany {
        return $this->hasMany(Kunjungan::class, "siswa_id", "id");
    }
}
