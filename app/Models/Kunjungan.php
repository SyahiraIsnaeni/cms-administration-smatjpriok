<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kunjungan extends Model
{
    protected $table = 'kunjungans';
    protected $fillable = ['guru_id', 'siswa_id', 'tanggal'];

    public function guru():BelongsTo {
        return $this->belongsTo(Guru::class, "guru_id", "id");
    }

    public function siswa():BelongsTo {
        return $this->belongsTo(Siswa::class, "siswa_id", "id");
    }

}
