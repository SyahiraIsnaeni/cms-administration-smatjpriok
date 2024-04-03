<?php

namespace App\Services;

use App\Models\Siswa;
use Illuminate\Pagination\LengthAwarePaginator;

interface SiswaService
{
    public function get(int $kelasId):LengthAwarePaginator;

    public function add(array $data): Siswa;

    public function edit(int $id, array $data): Siswa;

    public function delete(int $id):bool;

    public function deleteAll(int $kelasId):bool;

    public function addFromExcel(int $kelasId, $file): void;
}
