<?php

namespace App\Services;

use App\Models\Galeri;
use Illuminate\Pagination\LengthAwarePaginator;

interface GaleriService
{
    public function get():LengthAwarePaginator;
    public function getFewData():LengthAwarePaginator;
    public function add(array $data): Galeri;

    public function edit(int $id, array $data): Galeri;

    public function delete(int $id):bool;
}
