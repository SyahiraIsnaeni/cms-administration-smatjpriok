<?php

namespace App\Services\Impl;

use App\Models\Berita;
use App\Models\Pengumuman;
use App\Services\PengumumanService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PengumumanServiceImpl implements PengumumanService
{
    public function get(): LengthAwarePaginator
    {
        return Pengumuman::orderBy('created_at', 'desc')->paginate(12);
    }

    public function getFewData(): LengthAwarePaginator
    {
        return Pengumuman::withTrashed()->orderBy('created_at', 'desc')->where('is_active', 1)->paginate(5);
    }

    public function add(array $data): Pengumuman
    {
        $pengumuman = new Pengumuman();
        $pengumuman->judul = $data['judul'];
        $pengumuman->penulis = $data['penulis'];
        $pengumuman->slug = $data['slug'];
        $pengumuman->konten = $data['konten'];
        $pengumuman->kategori_pengumuman_id = $data['kategori_pengumuman_id'];
        $pengumuman->is_active = $data['is_active'];

        if (isset($data['gambar'])) {
            $originalName = $data['gambar']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $gambarPath = $data['gambar']->storeAs('public/pengumuman/gambar', $namaFile);
            $pengumuman->gambar = $namaFile;
        }

        if (isset($data['dokumen'])) {
            $originalName = $data['dokumen']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $dokumenPath = $data['dokumen']->storeAs('public/pengumuman/dokumen', $namaFile);
            $pengumuman->dokumen = $namaFile;
        }

        $pengumuman->save();

        return $pengumuman;
    }

    public function edit(int $id, array $data): Pengumuman
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $pengumuman->judul = $data['judul'];
        $pengumuman->penulis = $data['penulis'];
        $pengumuman->slug = $data['slug'];
        $pengumuman->konten = $data['konten'];
        $pengumuman->kategori_pengumuman_id = $data['kategori_pengumuman_id'];
        $pengumuman->is_active = $data['is_active'];

        if (isset($data['gambar'])) {
            if ($pengumuman->gambar) {
                Storage::delete('public/pengumuman/gambar' . $pengumuman->gambar);
            }

            $originalName = $data['gambar']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $gambarPath = $data['gambar']->storeAs('public/pengumuman/gambar', $namaFile);
            $pengumuman->gambar = $namaFile;
        }

        if (isset($data['dokumen'])) {
            if ($pengumuman->dokumen) {
                Storage::delete('public/pengumuman/dokumen' . $pengumuman->gambar);
            }

            $originalName = $data['dokumen']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $dokumenPath = $data['dokumen']->storeAs('public/pengumuman/dokumen', $namaFile);
            $pengumuman->dokumen = $namaFile;
        }

        $pengumuman->save();

        return $pengumuman;
    }

    public function softDelete(int $id): bool
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return true;
    }

    public function hardDelete(int $id): bool
    {
        $pengumuman = Pengumuman::onlyTrashed()->findOrFail($id);
        Storage::delete('public/pengumuman/gambar' . $pengumuman->gambar);
        Storage::delete('public/pengumuman/dokumen' . $pengumuman->dokumen);
        $pengumuman->forceDelete();
        return true;
    }

    public function restore(int $id): bool{
        $pengumuman = Pengumuman::onlyTrashed()->findOrFail($id);
        $pengumuman->restore();
        return true;
    }

    public function history(): LengthAwarePaginator{
        $pengumuman = Pengumuman::onlyTrashed()->orderBy('created_at', 'desc')->paginate(10);
        return $pengumuman;
    }

}
