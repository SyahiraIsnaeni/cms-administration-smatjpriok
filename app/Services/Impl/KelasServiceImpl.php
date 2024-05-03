<?php

namespace App\Services\Impl;

use App\Models\Kelas;
use App\Services\KelasService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class KelasServiceImpl implements KelasService
{
    public function get(): LengthAwarePaginator
    {
        return Kelas::orderBy('nama_kelas', 'asc')->paginate(10);
    }

    public function getId($id): Kelas
    {
        return Kelas::findOrFail($id);
    }

    public function add(array $data): Kelas
    {
        $kelas = new Kelas();
        $kelas->nama_kelas = $data['nama_kelas'];

        $kelas->save();

        return $kelas;
    }

    public function edit(int $id, array $data): Kelas
    {
        $kelas = Kelas::findOrFail($id);

        $kelas->nama_kelas = $data['nama_kelas'];

        $kelas->save();

        return $kelas;
    }

    public function delete(int $id): bool
    {
        $kelas = Kelas::findOrFail($id);
        return $kelas->delete();
    }
}
