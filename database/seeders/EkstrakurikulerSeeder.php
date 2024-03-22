<?php

namespace Database\Seeders;

use App\Models\Ekstrakurikuler;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EkstrakurikulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ekstrakurikuler::create([
            'nama' => 'Basketball Club',
            'logo' => 'basketball_logo.png',
            'deskripsi' => 'Ekstrakurikuler klub bola basket sekolah.',
        ]);
    }
}
