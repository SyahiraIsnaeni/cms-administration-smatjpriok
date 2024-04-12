<?php

use Illuminate\Database\Seeder;
use App\Models\Jadwal;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jadwal::insert([
            ['mapel_id' => 1, 'day_id' => 1, 'start_time' => '06:30:00', 'end_time' => '08:00:00'],
            ['mapel_id' => 2, 'day_id' => 1, 'start_time' => '08:00:00', 'end_time' => '09:30:00'],
            ['mapel_id' => 3, 'day_id' => 1, 'start_time' => '10:00:00', 'end_time' => '11:30:00'],
            ['mapel_id' => 4, 'day_id' => 1, 'start_time' => '13:00:00', 'end_time' => '15:00:00'],

            ['mapel_id' => 5, 'day_id' => 2, 'start_time' => '06:30:00', 'end_time' => '08:00:00'],
            ['mapel_id' => 6, 'day_id' => 2, 'start_time' => '08:00:00', 'end_time' => '09:30:00'],
            ['mapel_id' => 7, 'day_id' => 2, 'start_time' => '10:00:00', 'end_time' => '11:30:00'],
            ['mapel_id' => 8, 'day_id' => 2, 'start_time' => '13:00:00', 'end_time' => '15:00:00'],

            ['mapel_id' => 9, 'day_id' => 3, 'start_time' => '06:30:00', 'end_time' => '08:00:00'],
            ['mapel_id' => 10, 'day_id' => 3, 'start_time' => '08:00:00', 'end_time' => '09:30:00'],
            ['mapel_id' => 11, 'day_id' => 3, 'start_time' => '10:00:00', 'end_time' => '11:30:00'],
            ['mapel_id' => 1, 'day_id' => 3, 'start_time' => '13:00:00', 'end_time' => '15:00:00'],

            ['mapel_id' => 4, 'day_id' => 4, 'start_time' => '06:30:00', 'end_time' => '08:00:00'],
            ['mapel_id' => 3, 'day_id' => 4, 'start_time' => '08:00:00', 'end_time' => '09:30:00'],
            ['mapel_id' => 6, 'day_id' => 4, 'start_time' => '10:00:00', 'end_time' => '11:30:00'],
            ['mapel_id' => 7, 'day_id' => 4, 'start_time' => '13:00:00', 'end_time' => '15:00:00'],

            ['mapel_id' => 2, 'day_id' => 5, 'start_time' => '06:30:00', 'end_time' => '08:00:00'],
            ['mapel_id' => 6, 'day_id' => 5, 'start_time' => '08:00:00', 'end_time' => '09:30:00'],
            ['mapel_id' => 9, 'day_id' => 5, 'start_time' => '10:00:00', 'end_time' => '11:30:00'],
            ['mapel_id' => 11, 'day_id' => 5, 'start_time' => '13:00:00', 'end_time' => '15:00:00'],
        ]);
    }
}
