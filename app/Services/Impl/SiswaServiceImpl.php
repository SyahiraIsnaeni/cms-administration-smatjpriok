<?php

namespace App\Services\Impl;

use App\Imports\GuruImport;
use App\Imports\SiswaImport;
use App\Models\Siswa;
use App\Services\SiswaService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class SiswaServiceImpl implements SiswaService
{

    public function get(int $kelasId): LengthAwarePaginator
    {
        return Siswa::where('kelas_id', $kelasId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function add(array $data): Siswa
    {
        $siswa = new Siswa();
        $siswa->nama = $data['nama'];
        $siswa->nis = $data['nis'];
        $siswa->jenis_kelamin = $data['jenis_kelamin'];
        $siswa->email = $data['email'];
        $siswa->password = Hash::make($data['nis']);
        $siswa->kelas_id = $data['kelas_id'];

        $siswa->save();

        return $siswa;
    }

    public function edit(int $id, array $data): Siswa
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->nama = $data['nama'];
        $siswa->nis = $data['nis'];
        $siswa->jenis_kelamin = $data['jenis_kelamin'];
        $siswa->email = $data['email'];
        $siswa->password = Hash::make($data['nis']);
        $siswa->kelas_id = $data['kelas_id'];

        $siswa->save();

        return $siswa;
    }

    public function delete(int $id): bool
    {
        $siswa = Siswa::findOrFail($id);
        return $siswa->delete();
    }

    public function deleteAll(int $kelasId): bool
    {
        try {
            Siswa::where('kelas_id', $kelasId)->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function addFromExcel(int $kelasId, $file): void
    {
        Excel::import(new SiswaImport($kelasId), $file);
    }

}
