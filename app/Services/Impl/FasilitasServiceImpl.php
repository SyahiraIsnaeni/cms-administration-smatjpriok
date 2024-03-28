<?php

namespace App\Services\Impl;

use App\Models\Fasilitas;
use App\Services\FasilitasService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FasilitasServiceImpl implements FasilitasService
{
    public function get(): LengthAwarePaginator
    {
        return Fasilitas::orderBy('created_at', 'desc')->paginate(10);
    }

    public function getAll(): Collection
    {
        return Fasilitas::orderBy('created_at', 'desc')->get();
    }

    public function add(array $data): Fasilitas
    {
        $fasilitas = new Fasilitas();
        $fasilitas->nama = $data['nama'];

        if (isset($data['gambar'])) {
            $originalName = $data['gambar']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $gambarPath = $data['gambar']->storeAs('public/fasilitas', $namaFile);
            $fasilitas->gambar = $namaFile;
        }

        $fasilitas->save();

        return $fasilitas;
    }

    public function edit(int $id, array $data): Fasilitas
    {
        $fasilitas = Fasilitas::findOrFail($id);

        $fasilitas->nama = $data['nama'];

        if (isset($data['gambar'])) {
            if ($fasilitas->gambar) {
                Storage::delete('public/fasilitas' . $fasilitas->gambar);
            }

            $originalName = $data['gambar']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $gambarPath = $data['gambar']->storeAs('public/fasilitas', $namaFile);
            $fasilitas->gambar = $namaFile;
        }

        $fasilitas->save();

        return $fasilitas;
    }

    public function delete(int $id): bool
    {
        $fasilitas = Fasilitas::findOrFail($id);
        Storage::delete('public/fasilitas' . $fasilitas->gambar);
        $fasilitas->delete();

        return true;
    }

}
