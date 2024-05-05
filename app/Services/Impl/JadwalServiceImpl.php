<?php

namespace App\Services\Impl;

use App\Models\Day;
use App\Models\Jadwal;
use App\Services\JadwalService;

class JadwalServiceImpl implements JadwalService
{

    public function get()
    {
        $jadwals = Jadwal::with(['mapel', 'day'])
            ->orderBy('day_id')
            ->get();

        $sortedJadwals = $jadwals->sortBy(function ($jadwal) {
            $dayNames = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
            return array_search($jadwal->day->nama, $dayNames);
        });

        return $sortedJadwals;
    }

    public function getDay()
    {
        $days = Day::all();

        return $days;
    }

    public function add(array $data)
    {
        $existingJadwal = Jadwal::where('mapel_id', $data['mapel'])
            ->where(function ($query) use ($data) {
                $query->whereBetween('start_time', [$data['start'], $data['end']])
                    ->orWhereBetween('end_time', [$data['start'], $data['end']])
                    ->orWhere(function ($query) use ($data) {
                        $query->where('start_time', '<', $data['end'])
                            ->where('end_time', '>', $data['start']);
                    });
            })
            ->first();

        if ($existingJadwal) {
            return false;
        }

        $jadwal = new Jadwal();
        $jadwal->mapel_id = $data['mapel'];
        $jadwal->day_id = $data['day'];
        $jadwal->start_time = $data['start'];
        $jadwal->end_time = $data['end'];

        $jadwal->save();

        return true;
    }

    public function edit($id, array $data)
    {
        $existingJadwal = Jadwal::where('mapel_id', $data['mapel'])
            ->where('day_id', $data['day'])
            ->where('id', '!=', $id)
            ->where(function ($query) use ($data) {
                $query->whereBetween('start_time', [$data['start'], $data['end']])
                    ->orWhereBetween('end_time', [$data['start'], $data['end']])
                    ->orWhere(function ($query) use ($data) {
                        $query->where('start_time', '<', $data['end'])
                            ->where('end_time', '>', $data['start']);
                    });
            })
            ->first();

        if ($existingJadwal) {
            return false;
        }

        $jadwal = Jadwal::findOrFail($id);

        $jadwal->mapel_id = $data['mapel'];
        $jadwal->day_id = $data['day'];
        $jadwal->start_time = $data['start'];
        $jadwal->end_time = $data['end'];

        $jadwal->save();

        return true;
    }

    public function delete($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return $jadwal->delete();
    }

    public function deleteAll()
    {
        try {
            Jadwal::truncate();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
