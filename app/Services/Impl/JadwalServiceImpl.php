<?php

namespace App\Services\Impl;

use App\Models\Day;
use App\Models\Jadwal;
use App\Models\MataPelajaran;
use App\Services\JadwalService;
use App\Services\MataPelajaranService;
use Illuminate\Support\Facades\DB;

class JadwalServiceImpl implements JadwalService
{

    public function get()
    {
        $jadwals = Jadwal::with(['mapel.kelas', 'day'])
            ->orderBy('day_id')
            ->get();

        $dayOrder = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $sortedJadwals = $jadwals->sortBy(function ($jadwal) {
            return $jadwal->start_time;
        })->sortBy(function ($jadwal) {
            return $jadwal->mapel->kelas->nama_kelas;
        })->sortBy(function ($jadwal) use ($dayOrder) {
            return array_search($jadwal->day->nama, $dayOrder);
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
        $mapel = MataPelajaran::findOrFail($data['mapel']);

        $existingJadwal = Jadwal::where('day_id', $data['day'])
            ->whereHas('mapel', function ($query) use ($mapel) {
                $query->where('kelas_id', $mapel->kelas_id);
            })
            ->where(function ($query) use ($data) {
                $query->whereBetween('start_time', [$data['start'], $data['end']])
                    ->orWhereBetween('end_time', [$data['start'], $data['end']])
                    ->orWhere(function ($query) use ($data) {
                        $query->where('start_time', '<', $data['end'])
                            ->where('end_time', '>', $data['start']);
                    });
            })
            ->orWhere(function ($query) use ($data, $mapel) {
                $query->where('day_id', '!=', $data['day'])
                    ->whereExists(function ($query) use ($data, $mapel) {
                        $query->select(DB::raw(1))
                            ->from('jadwals as j')
                            ->whereColumn('j.day_id', 'jadwals.day_id')
                            ->where('j.mapel_id', $mapel->id)
                            ->whereBetween('j.start_time', [$data['start'], $data['end']])
                            ->whereBetween('j.end_time', [$data['start'], $data['end']]);
                    });
            })
            ->first();

        if ($existingJadwal) {
            return false;
        }

        $jadwal = new Jadwal();
        $jadwal->mapel_id = $mapel->id;
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

    public function getJadwalKelas($kelasId)
    {
        $jadwal = Jadwal::with(['mapel.kelas'])
            ->whereHas('mapel.kelas', function ($query) use ($kelasId) {
                $query->where('id', $kelasId);
            })
            ->orderBy('day_id')
            ->orderBy('start_time')
            ->get();

        return $jadwal;
    }

    public function getJadwalGuru($guruId)
    {
        $jadwal = Jadwal::with(['mapel.guru'])
            ->whereHas('mapel.guru', function ($query) use ($guruId) {
                $query->where('id', $guruId);
            })
            ->orderBy('day_id')
            ->orderBy('start_time')
            ->get();

        return $jadwal;
    }
}
