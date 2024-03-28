<?php

namespace App\Services\Impl;

use App\Models\Prestasi;
use App\Services\PrestasiService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PrestasiServiceImpl implements PrestasiService
{
    public function get(): LengthAwarePaginator
    {
        return Prestasi::orderBy('created_at', 'desc')->paginate(12);
    }

    public function getFewData(): LengthAwarePaginator
    {
        return Prestasi::orderBy('created_at', 'asc')->paginate(5);
    }

    public function add(array $data): Prestasi
    {
        $prestasi = new Prestasi();
        $prestasi->nama = $data['nama'];
        $prestasi->kejuaraan = $data['kejuaraan'];

        if (isset($data['gambar'])) {
            $originalName = $data['gambar']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $gambarPath = $data['gambar']->storeAs('public/prestasi', $namaFile);
            $prestasi->gambar = $namaFile;
        }

        $prestasi->deskripsi = $data['deskripsi'];
        $prestasi->save();

        return $prestasi;
    }

    public function edit(int $id, array $data): Prestasi
    {
        $prestasi = Prestasi::findOrFail($id);

        $prestasi->nama = $data['nama'];
        $prestasi->kejuaraan = $data['kejuaraan'];
        $prestasi->deskripsi = $data['deskripsi'];

        if (isset($data['gambar'])) {
            if ($prestasi->gambar) {
                Storage::delete('public/prestasi/' . $prestasi->gambar);
            }

            $originalName = $data['gambar']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $gambarPath = $data['gambar']->storeAs('public/prestasi', $namaFile);
            $prestasi->gambar = $namaFile;
        }

        $prestasi->save();

        return $prestasi;
    }

    public function delete(int $id): bool
    {
        $prestasi = Prestasi::findOrFail($id);
        Storage::delete('public/prestasi/' . $prestasi->gambar);
        $prestasi->delete();

        return true;
    }
}
