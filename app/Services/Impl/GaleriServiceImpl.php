<?php

namespace App\Services\Impl;

use App\Models\GaleriImages;
use App\Models\Galeri;
use App\Services\GaleriService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GaleriServiceImpl implements GaleriService
{
    public function get(): LengthAwarePaginator
    {
        return Galeri::orderBy('created_at', 'desc')->paginate(10);
    }

    public function getFewData(): LengthAwarePaginator
    {
        return Galeri::orderBy('created_at', 'desc')->paginate(3);
    }

    public function add(array $data): Galeri
    {
        $galeri = new Galeri();
        $galeri->judul = $data['judul'];

        if (isset($data['thumbnail'])) {
            $originalName = $data['thumbnail']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_'); // Hapus ekstensi dan ganti spasi dengan _
            $logoPath = $data['thumbnail']->storeAs('public/galeri-thumbnail', $namaFile);
            $galeri->thumbnail = $namaFile;
        }

        $galeri->save();

        if (isset($data['images'])) {
            foreach ($data['images'] as $image) {
                $originalName = $image->getClientOriginalName();
                $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_'); // Hapus ekstensi dan ganti spasi dengan _
                $imagePath = $image->storeAs('public/galeri-images', $namaFile);
                $galeriImage = new GaleriImages();
                $galeriImage->image = $namaFile; // Simpan nama asli di database
                $galeriImage->galeri_id = $galeri->id;
                $galeriImage->save();
            }
        }

        return $galeri;
    }

    public function edit(int $id, array $data): Galeri
    {
        $galeri = Galeri::findOrFail($id);

        $galeri->judul = $data['judul'];

        if (isset($data['thumbnail'])) {
            if ($galeri->thumbnail) {
                // Hapus gambar logo yang lama dari storage
                Storage::delete('public/galeri-thumbnail/' . $galeri->thumbnail);
            }

            $originalName = $data['thumbnail']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $logoPath = $data['thumbnail']->storeAs('public/galeri-thumbnail', $namaFile);
            $galeri->thumbnail = $namaFile;
        }

        if (isset($data['images'])) {
            foreach ($galeri->images as $image) {
                if (!in_array($image->image, $data['images'])) {
                    Storage::delete('public/galeri-images/' . $image->image);
                    $image->delete();
                }
            }

            foreach ($data['images'] as $image) {
                $originalName = $image->getClientOriginalName();
                $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
                $imagePath = $image->storeAs('public/galeri-images', $namaFile);
                $galeriImage = new GaleriImages();
                $galeriImage->image = $namaFile;
                $galeriImage->galeri_id = $galeri->id;
                $galeriImage->save();
            }
        }

        $galeri->save();

        return $galeri;
    }

    public function delete(int $id): bool
    {
        $galeri = Galeri::findOrFail($id);
        foreach ($galeri->images as $image) {
            Storage::delete('public/galeri-images/' . $image->image);
            $image->delete();
        }
        Storage::delete('public/galeri-thumbnail/' . $galeri->logo);
        $galeri->images()->delete();

        $galeri->delete();

        return true;
    }
}
