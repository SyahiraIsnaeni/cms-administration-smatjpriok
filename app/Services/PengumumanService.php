<?php

namespace App\Services;

use App\Models\Pengumuman;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface PengumumanService
{
    public function get():LengthAwarePaginator;

    public function getFewData():LengthAwarePaginator;

    public function add(array $data): Pengumuman;

    public function edit(int $id, array $data): Pengumuman;

    public function softDelete(int $id):bool;

    public function hardDelete(int $id):bool;
}
