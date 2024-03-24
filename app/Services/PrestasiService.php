<?php

namespace App\Services;

use App\Models\Prestasi;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface PrestasiService
{
    public function get():LengthAwarePaginator;

    public function getFewData():LengthAwarePaginator;

    public function add(array $data): Prestasi;

    public function edit(int $id, array $data): Prestasi;

    public function delete(int $id):bool;
}
