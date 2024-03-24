<?php

namespace App\Services;

use App\Models\KategoriBerita;
use Illuminate\Database\Eloquent\Collection;

interface KategoriBeritaService
{
    public function get():Collection;

    public function add(array $data): KategoriBerita;

    public function edit(int $id, array $data): KategoriBerita;

    public function delete(int $id):bool;
}
