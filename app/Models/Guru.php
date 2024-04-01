<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Guru extends Model
{
    use HasFactory;

    protected $table = "gurus";

    protected $primaryKey = "id";

    protected $fillable = ['nama', 'nip', 'jabatan', 'foto', 'email', 'password'];

}
