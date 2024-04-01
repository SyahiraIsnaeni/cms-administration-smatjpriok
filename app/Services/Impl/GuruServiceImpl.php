<?php

namespace App\Services\Impl;

use App\Imports\GuruImport;
use App\Models\Fasilitas;
use App\Models\Guru;
use App\Services\GuruService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class GuruServiceImpl implements GuruService
{
    public function get(): LengthAwarePaginator
    {
        return Guru::orderBy('created_at', 'desc')->paginate(10);
    }

    public function add(array $data): Guru
    {
        $guru = new Guru();
        $guru->nama = $data['nama'];
        $guru->nip = $data['nip'];
        $guru->jabatan = $data['jabatan'];
        $guru->email = $data['email'];
        $guru->password = Hash::make($data['nip']);

        if (isset($data['foto'])) {
            $originalName = $data['foto']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $gambarPath = $data['foto']->storeAs('public/guru', $namaFile);
            $guru->foto = $namaFile;
        }

        $guru->save();

        return $guru;
    }

    public function addFromExcel($file): void
    {
        Excel::import(new GuruImport(), $file);
    }

    public function edit(int $id, array $data): Guru
    {
        $guru = Guru::findOrFail($id);

        $guru->nama = $data['nama'];
        $guru->nip = $data['nip'];
        $guru->jabatan = $data['jabatan'];
        $guru->email = $data['email'];

        if (isset($data['foto'])) {
            if ($guru->foto) {
                Storage::delete('public/guru' . $guru->foto);
            }

            $originalName = $data['foto']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $gambarPath = $data['foto']->storeAs('public/guru', $namaFile);
            $guru->foto = $namaFile;
        }

        $guru->save();

        return $guru;
    }

    public function delete(int $id): bool
    {
        $guru = Guru::findOrFail($id);
        Storage::delete('public/guru' . $guru->foto);
        return $guru->delete();
    }

    public function deleteAll(): bool
    {
        try {
            Guru::truncate();
            Storage::deleteDirectory('public/guru');
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
