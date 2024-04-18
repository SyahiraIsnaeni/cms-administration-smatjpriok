<?php

namespace App\Services\Impl;

use App\Imports\StafImport;
use App\Models\Staf;
use App\Services\StafService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class StafServiceImpl implements StafService
{
    public function get(): LengthAwarePaginator
    {
        return Staf::orderBy('created_at', 'desc')->paginate(10);
    }

    public function add(array $data): Staf
    {
        $guru = new Staf();
        $guru->nama = $data['nama'];
        $guru->nip = $data['nip'];
        $guru->jabatan = $data['jabatan'];
        $guru->email = $data['email'];
        $guru->password = Hash::make($data['nip']);

        if (isset($data['foto'])) {
            $originalName = $data['foto']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $gambarPath = $data['foto']->storeAs('public/staf', $namaFile);
            $guru->foto = $namaFile;
        }

        $guru->save();

        return $guru;
    }

    public function addFromExcel($file): void
    {
        Excel::import(new StafImport(), $file);
    }

    public function edit(int $id, array $data): Staf
    {
        $guru = Staf::findOrFail($id);

        $guru->nama = $data['nama'];
        $guru->nip = $data['nip'];
        $guru->jabatan = $data['jabatan'];
        $guru->email = $data['email'];

        if (isset($data['foto'])) {
            if ($guru->foto) {
                Storage::delete('public/staf/' . $guru->foto);
            }

            $originalName = $data['foto']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $gambarPath = $data['foto']->storeAs('public/staf', $namaFile);
            $guru->foto = $namaFile;
        }

        $guru->save();

        return $guru;
    }

    public function delete(int $id): bool
    {
        $guru = Staf::findOrFail($id);
        Storage::delete('public/staf/' . $guru->foto);
        return $guru->delete();
    }

    public function deleteAll(): bool
    {
        try {
            Staf::truncate();
            Storage::deleteDirectory('public/staf');
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
