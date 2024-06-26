<?php

namespace App\Services\Impl;

use App\Models\Berita;
use App\Services\BeritaService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaServiceImpl implements BeritaService
{
    public function get(): LengthAwarePaginator
    {
        return Berita::orderBy('created_at', 'desc')->paginate(12);
    }

    public function getAll(?string $keyword = null): Collection
{
    $query = Berita::withTrashed()->where('is_active', 1);

    if ($keyword) {
        $query->where(function ($query) use ($keyword) {
            $query->where('judul', 'like', '%' . $keyword . '%');
        });
    }

    return $query->orderBy('created_at', 'desc')->get();
}


    public function getFewDataHp(): LengthAwarePaginator
    {
        $perPage = 3;
        return Berita::withTrashed()
            ->where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function getFewDataDekstop(): LengthAwarePaginator
    {
        $perPage = 3;

        $latest = Berita::withTrashed()
            ->where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$latest) {
            return Berita::withTrashed()
                ->where('is_active', 1)
                ->orderBy('created_at', 'desc')
                ->paginate($perPage);
        }

        return Berita::withTrashed()
            ->where('id', '!=', $latest->id)
            ->where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function getFirstData(): ?Berita
    {
        return Berita::withTrashed()
            ->where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public function add(array $data): Berita
    {
        $berita = new Berita();
        $berita->judul = $data['judul'];
        $berita->penulis = $data['penulis'];
        $berita->slug = $data['slug'];
        $berita->konten = $data['konten'];
        $berita->kategori_berita_id = $data['kategori_berita_id'];
        $berita->is_active = $data['is_active'];

        if (isset($data['gambar'])) {
            $originalName = $data['gambar']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $gambarPath = $data['gambar']->storeAs('public/berita', $namaFile);
            $berita->gambar = $namaFile;
        }

        $berita->save();

        return $berita;
    }

    public function edit(int $id, array $data): Berita
    {
        $berita = Berita::findOrFail($id);

        $berita->judul = $data['judul'];
        $berita->penulis = $data['penulis'];
        $berita->slug = $data['slug'];
        $berita->konten = $data['konten'];
        $berita->kategori_berita_id = $data['kategori_berita_id'];
        $berita->is_active = $data['is_active'];

        if (isset($data['gambar'])) {
            if ($berita->gambar) {
                Storage::delete('public/berita/' . $berita->gambar);
            }

            $originalName = $data['gambar']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $gambarPath = $data['gambar']->storeAs('public/berita', $namaFile);
            $berita->gambar = $namaFile;
        }

        $berita->save();

        return $berita;
    }

    public function softDelete(int $id): bool
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return true;
    }

    public function hardDelete(int $id): bool
    {
        $berita = Berita::onlyTrashed()->findOrFail($id);
        Storage::delete('public/berita/' . $berita->gambar);
        $berita->forceDelete();
        return true;
    }

    public function restore(int $id): bool{
        $berita = Berita::onlyTrashed()->findOrFail($id);
        $berita->restore();
        return true;
    }

    public function history(): LengthAwarePaginator{
        $berita = Berita::onlyTrashed()->orderBy('created_at', 'desc')->paginate(10);
        return $berita;
    }
}
