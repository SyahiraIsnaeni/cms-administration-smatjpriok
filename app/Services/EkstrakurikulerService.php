<?php

namespace App\Services;

use App\Models\Ekstrakurikuler;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface EkstrakurikulerService
{
    public function get():LengthAwarePaginator;
    public function getAll():Collection;
    public function add(array $data): Ekstrakurikuler;

    public function edit(int $id, array $data): Ekstrakurikuler;

    public function delete(int $id):bool;
}
