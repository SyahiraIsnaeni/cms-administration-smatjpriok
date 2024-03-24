<?php

namespace App\Services\Impl;

use App\Models\KategoriBerita;
use App\Services\KategoriBeritaService;
use Illuminate\Database\Eloquent\Collection;

class KategoriBeritaServiceImpl implements KategoriBeritaService
{
    public function get(): Collection
    {
        return KategoriBerita::orderBy('created_at', 'desc')->get();
    }

    public function add(array $data): KategoriBerita
    {
        $kategori = new KategoriBerita();
        $kategori->kategori = $data['kategori'];
        $kategori->slug = $data['slug'];

        $kategori->save();

        return $kategori;
    }

    public function edit(int $id, array $data): KategoriBerita
    {
        $kategori = KategoriBerita::findOrFail($id);

        $kategori->kategori = $data['kategori'];
        $kategori->slug = $data['slug'];

        $kategori->save();

        return $kategori;
    }

    public function delete(int $id): bool
    {
        $kategori = KategoriBerita::findOrFail($id);

        $kategori->delete();

        return true;
    }
}
