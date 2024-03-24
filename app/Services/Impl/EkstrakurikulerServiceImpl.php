<?php

namespace App\Services\Impl;

use App\Models\Ekstrakurikuler;
use App\Models\EkstrakurikulerImages;
use App\Services\EkstrakurikulerService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use function Laravel\Prompts\table;

class EkstrakurikulerServiceImpl implements EkstrakurikulerService
{

    public function get(): LengthAwarePaginator
    {
        return Ekstrakurikuler::orderBy('created_at', 'desc')->paginate(5);
    }

    public function getAll(): Collection
    {
        return Ekstrakurikuler::orderBy('created_at', 'desc')->get();
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
        $ekstrakurikuler->deskripsi = $data['deskripsi'];

        if (isset($data['logo'])) {
            if ($ekstrakurikuler->logo) {
                // Hapus gambar logo yang lama dari storage
                Storage::delete('public/ekstrakurikuler-logos/' . $ekstrakurikuler->logo);
            }

            $originalName = $data['logo']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $logoPath = $data['logo']->storeAs('public/ekstrakurikuler-logos', $namaFile);
            $ekstrakurikuler->logo = $namaFile;
        }

        if (isset($data['images'])) {
            foreach ($ekstrakurikuler->images as $image) {
                if (!in_array($image->image, $data['images'])) {
                    Storage::delete('public/ekstrakurikuler-images/' . $image->image);
                    $image->delete();
                }
            }

            foreach ($data['images'] as $image) {
                $originalName = $image->getClientOriginalName();
                $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
                $imagePath = $image->storeAs('public/ekstrakurikuler-images', $namaFile);
                $ekstrakurikulerImage = new EkstrakurikulerImages();
                $ekstrakurikulerImage->image = $namaFile;
                $ekstrakurikulerImage->ekstrakurikuler_id = $ekstrakurikuler->id;
                $ekstrakurikulerImage->save();
            }
        }

        $ekstrakurikuler->save();

        return $ekstrakurikuler;
    }

    public function delete(int $id): bool
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);
        foreach ($ekstrakurikuler->images as $image) {
            Storage::delete('public/ekstrakurikuler-images/' . $image->image);
            $image->delete();
        }
        Storage::delete('public/ekstrakurikuler-logos/' . $ekstrakurikuler->logo);
        $ekstrakurikuler->images()->delete();

        $ekstrakurikuler->delete();

        return true;
    }
}
