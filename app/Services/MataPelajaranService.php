<?php

namespace App\Services;

use App\Models\MataPelajaran;
use Illuminate\Pagination\LengthAwarePaginator;

interface MataPelajaranService
{
    public function get(int $kelasId):LengthAwarePaginator;

    public function add(array $data): MataPelajaran;

    public function edit(int $id, array $data): MataPelajaran;

    public function delete(int $id):bool;

    public function deleteAll(int $kelasId):bool;
}
