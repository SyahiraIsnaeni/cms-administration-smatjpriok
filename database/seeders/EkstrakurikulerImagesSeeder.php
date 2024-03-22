<?php

namespace Database\Seeders;

use App\Models\EkstrakurikulerImages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EkstrakurikulerImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EkstrakurikulerImages::create([
            'image' => 'image1.png',
            'ekstrakurikuler_id' => 1,
        ]);

        EkstrakurikulerImages::create([
            'image' => 'image2.png',
            'ekstrakurikuler_id' => 1,
        ]);
    }
}
