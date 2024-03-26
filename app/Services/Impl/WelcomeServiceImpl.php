<?php

namespace App\Services\Impl;

use App\Models\Welcome;
use App\Services\WelcomeService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WelcomeServiceImpl implements WelcomeService
{
    public function get(): Collection
    {
        return Welcome::orderBy('created_at', 'desc')->get();
    }

    public function add(array $data): Welcome
    {
        $welcome = new Welcome();

        if (isset($data['gambar'])) {
            $originalName = $data['gambar']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $gambarPath = $data['gambar']->storeAs('public/welcome', $namaFile);
            $welcome->gambar = $namaFile;
        }

        $welcome->save();

        return $welcome;
    }

    public function delete(int $id): bool
    {
        $welcome = Welcome::findOrFail($id);
        Storage::delete('public/welcome' . $welcome->gambar);
        $welcome->delete();

        return true;
    }
}
