<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jadwal extends Model
{
    protected $fillable = ['mapel_id', 'day_id', 'start_time','end_time'];

    public function mapel():BelongsTo {
        return $this->belongsTo(MataPelajaran::class, "mapel_id", "id");
    }

    public function day():BelongsTo {
        return $this->belongsTo(Day::class, "day_id", "id");
    }
}
