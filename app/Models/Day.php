<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Day extends Model
{
    protected $fillable = ['name'];

    public function jadwals(): HasMany {
        return $this->hasMany(Jadwal::class,'day_id', "id");
    }
}
