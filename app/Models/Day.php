<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = ['nama'];

    public function jadwals() {
        return $this->hasMany('App\Models\Jadwal','day_id');
    }
}
