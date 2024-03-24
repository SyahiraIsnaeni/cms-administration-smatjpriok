<?php

namespace App\Services\Impl;

use App\Models\KategoriPengumuman;
use App\Services\KategoriPengumumanService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KategoriPengumumanServiceImpl implements KategoriPengumumanService
{
    public function get(): Collection
    {
        return KategoriPengumuman::orderBy('created_at', 'desc')->get();
    }

    public function add(array $data): KategoriPengumuman
    {
        $kategori = new KategoriPengumuman();
        $kategori->kategori = $data['kategori'];
        $kategori->slug = $data['slug'];

        $kategori->save();

        return $kategori;
    }

    public function edit(int $id, array $data): KategoriPengumuman
    {
        $kategori = KategoriPengumuman::findOrFail($id);

        $kategori->kategori = $data['kategori'];
        $kategori->slug = $data['slug'];

        $kategori->save();

        return $kategori;
    }

    public function delete(int $id): bool
    {
        $kategori = KategoriPengumuman::findOrFail($id);

        $kategori->delete();

        return true;
    }
}
