<?php

namespace App\Services;

use App\Models\KategoriPengumuman;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface KategoriPengumumanService
{
    public function get():Collection;

    public function add(array $data): KategoriPengumuman;

    public function edit(int $id, array $data): KategoriPengumuman;

    public function delete(int $id):bool;

}
