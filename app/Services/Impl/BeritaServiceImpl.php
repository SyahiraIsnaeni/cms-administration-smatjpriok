<?php

namespace App\Services\Impl;

use App\Models\Berita;
use App\Services\BeritaService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaServiceImpl implements BeritaService
{
    public function get(): LengthAwarePaginator
    {
        return Berita::orderBy('created_at', 'desc')->paginate(12);
    }

    public function getFewData(): LengthAwarePaginator
    {
        return Berita::orderBy('created_at', 'desc')->paginate(5);
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
                Storage::delete('public/berita' . $berita->gambar);
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
        Storage::delete('public/berita' . $berita->gambar);
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
