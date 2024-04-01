<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    use HasFactory;

    protected $table = "stafs";

    protected $primaryKey = "id";

    protected $fillable = ['nama', 'nip', 'jabatan', 'foto', 'email', 'password'];
}
