<?php

namespace App\Services\Impl;

use App\Models\MataPelajaran;
use App\Services\MataPelajaranService;
use Illuminate\Pagination\LengthAwarePaginator;

class MataPelajaranServiceImpl implements MataPelajaranService
{
    public function get(int $kelasId): LengthAwarePaginator
    {
        return MataPelajaran::where('kelas_id', $kelasId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function add(array $data): MataPelajaran
    {
        $mapel = new MataPelajaran();
        $mapel->nama = $data['nama'];
        $mapel->kelas_id = $data['kelas_id'];
        $mapel->guru_id = $data['guru_id'];

        $mapel->save();

        return $mapel;
    }

    public function edit(int $id, array $data): MataPelajaran
    {
        $mapel = MataPelajaran::findOrFail($id);

        $mapel->nama = $data['nama'];
        $mapel->kelas_id = $data['kelas_id'];
        $mapel->guru_id = $data['guru_id'];

        $mapel->save();

        return $mapel;
    }

    public function delete(int $id): bool
    {
        $mapel = MataPelajaran::findOrFail($id);
        return $mapel->delete();
    }

    public function deleteAll(int $kelasId): bool
    {
        try {
            MataPelajaran::where('kelas_id', $kelasId)->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
