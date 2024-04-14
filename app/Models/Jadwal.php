<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = ['jadwal_id', 'mapel_id', 'day_id', 'guru_id', 'start_time','end_time'];

    public function mapel() {
        return $this->belongsTo('App\Models\MataPelajaran');
    }

    public function guru() {
        return $this->belongsTo('App\Models\Guru');
    }

    public function day() {
        return $this->belongsTo('App\Models\Day');
    }
}
