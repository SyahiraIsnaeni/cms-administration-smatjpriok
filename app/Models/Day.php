<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = ['name'];

    public function schedules() {
        return $this->hasMany('App\Models\Jadwal','day_id');
    }
}
