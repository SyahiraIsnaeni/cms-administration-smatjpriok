<?php

namespace App\Services\Impl;

use App\Models\Ekstrakurikuler;
use App\Models\EkstrakurikulerImages;
use App\Services\EkstrakurikulerService;

class EkstrakurikulerServiceImpl implements EkstrakurikulerService
{

    public function add(array $data): Ekstrakurikuler
    {
        $ekstrakurikuler = new Ekstrakurikuler();
        $ekstrakurikuler->nama = $data['nama'];
        $ekstrakurikuler->logo = $data['logo'];
        $ekstrakurikuler->deskripsi = $data['deskripsi'];
        $ekstrakurikuler->save();

        if (isset($data['images'])) {
            foreach ($data['images'] as $image) {
                $ekstrakurikulerImage = new EkstrakurikulerImages();
                $ekstrakurikulerImage->image = $image;
                $ekstrakurikulerImage->ekstrakurikuler_id = $ekstrakurikuler->id;
                $ekstrakurikulerImage->save();
            }
        }

        // Return model Ekstrakurikuler yang baru dibuat
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
