<?php

namespace App\Services;

use App\Models\Kelas;
use Illuminate\Pagination\LengthAwarePaginator;

interface KelasService
{
    public function get():LengthAwarePaginator;

    public function getId($id): Kelas;

    public function add(array $data): Kelas;

    public function edit(int $id, array $data): Kelas;

    public function delete(int $id):bool;

}
