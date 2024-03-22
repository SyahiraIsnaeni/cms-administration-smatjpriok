<?php

namespace App\Services\Impl;

use App\Models\Ekstrakurikuler;
use App\Models\EkstrakurikulerImages;
use App\Services\EkstrakurikulerService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class EkstrakurikulerServiceImpl implements EkstrakurikulerService
{

    public function get(): Collection
    {
        return Ekstrakurikuler::all();
    }

    public function add(array $data): Ekstrakurikuler
    {
        $ekstrakurikuler = new Ekstrakurikuler();
        $ekstrakurikuler->nama = $data['nama'];

        if (isset($data['logo'])) {
            $originalName = $data['logo']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_'); // Hapus ekstensi dan ganti spasi dengan _
            $logoPath = $data['logo']->storeAs('public/ekstrakurikuler-logos', $namaFile);
            $ekstrakurikuler->logo = $namaFile; // Simpan nama asli di database
        }

        $ekstrakurikuler->deskripsi = $data['deskripsi'];
        $ekstrakurikuler->save();

        if (isset($data['images'])) {
            foreach ($data['images'] as $image) {
                $originalName = $image->getClientOriginalName();
                $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_'); // Hapus ekstensi dan ganti spasi dengan _
                $imagePath = $image->storeAs('public/ekstrakurikuler-images', $namaFile);
                $ekstrakurikulerImage = new EkstrakurikulerImages();
                $ekstrakurikulerImage->image = $namaFile; // Simpan nama asli di database
                $ekstrakurikulerImage->ekstrakurikuler_id = $ekstrakurikuler->id;
                $ekstrakurikulerImage->save();
            }
        }

        return $ekstrakurikuler;
    }

    public function edit(int $id, array $data): Ekstrakurikuler
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        $ekstrakurikuler->nama = $data['nama'];
        $ekstrakurikuler->logo = $data['logo'];
        $ekstrakurikuler->deskripsi = $data['deskripsi'];
        $ekstrakurikuler->save();

        if (isset($data['images'])) {
            $ekstrakurikuler->images()->delete();

            foreach ($data['images'] as $image) {
                $ekstrakurikulerImage = new EkstrakurikulerImages();
                $ekstrakurikulerImage->image = $image;
                $ekstrakurikulerImage->ekstrakurikuler_id = $ekstrakurikuler->id;
                $ekstrakurikulerImage->save();
            }
        }

        return $ekstrakurikuler;
    }

    public function delete(int $id): bool
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        $ekstrakurikuler->images()->delete();

        $ekstrakurikuler->delete();

        return true;
    }
}
